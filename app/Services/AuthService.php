<?php

namespace App\Services;

use App\Mail\ForgotPassword;
use App\Repositories\OfficeStaffRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

/**
 * Class AuthService.
 */
class AuthService
{
    public function login(Request $request): string|array
    {
        $data = [];

        try {
            /**
             * Check credentials
             */
            $credentials = [
                'username' => $request->username,
                'password' => $request->password,
                'enabled' => true,
            ];

            $token = auth()->attempt($credentials);

            if (! $token) {
                throw new Exception(__('unauthorized'));
            }

            /**
             * Get office staff
             */
            $office_staff = auth()->user();

            /**
             * Assemble data
             */
            $data = $office_staff;
        } catch (Exception $e) {
            return $e->getMessage();
        } finally {
            //
        }

        return $data;
    }

    public static function refresh(): string|array
    {
        $data = [];

        try {
            /**
             * Refresh token
             */
            $token = Auth::refresh();

            if (! $token) {
                throw new Exception(__('unauthorized'));
            }

            /**
             * Get office staff
             */
            $office_staff = auth()->user();

            /**
             * Assemble data
             */
            $data = $office_staff;
        } catch (Exception $e) {
            return $e->getMessage();
        }

        return $data;
    }

    public function recover(string $remember_token): string|array
    {
        $data = [];

        try {
            /**
             * Get office staff
             */
            $office_staff = OfficeStaffRepository::getRememberTokenSingle($remember_token);

            if ($office_staff === null) {
                throw new Exception(__('affiliate_not_recover'));
            }

            $office_staff->remember_token = $remember_token;

            /**
             * Assemble data
             */
            $data = $office_staff;
        } catch (Exception $e) {
            return $e->getMessage();
        } finally {
            //
        }

        return $data;
    }

    public function forgotStore(Request $request): ?string
    {
        try {
            /**
             * Get office staff
             */
            $office_staff = OfficeStaffRepository::getEmailSingle($request->email);

            if ($office_staff === null) {
                $office_staff = OfficeStaffRepository::getEmailSingle($request->email);
            }

            if ($office_staff === null) {
                throw new Exception('Email not found in the system');
            }

            $office_staff->remember_token = hash('sha256', $office_staff->id.$office_staff->name.Str::random(30));

            $office_staff->save();

            if (! $office_staff) {
                throw new Exception('Email not found in the system');
            }

            Mail::to($office_staff->email, $office_staff->name)
                ->send(new ForgotPassword($office_staff));
        } catch (Exception $e) {
            return $e->getMessage();
        } finally {
            //
        }

        return null;
    }

    public function recoverStore(Request $request): string|array
    {
        $data = [];

        try {
            /**
             * Get office staff
             */
            $office_staff = OfficeStaffRepository::getRememberTokenSingle($request->_remember_token);

            if ($office_staff === null) {
                $office_staff = OfficeStaffRepository::getRememberTokenSingle($request->_remember_token);
            }

            if ($office_staff === null) {
                throw new Exception('User not found in the system');
            }

            /**
             * Update office staff
             */
            $office_staff->remember_token = null;
            $office_staff->password = Hash::make($request->password);

            $office_staff->save();
        } catch (Exception $e) {
            return $e->getMessage();
        } finally {
            //
        }

        return $data;
    }

    public function logout(): ?string
    {
        try {
            Auth::invalidate(true);

            auth()->logout(true);
        } catch (Exception $e) {
            return $e->getMessage();
        } finally {
            //
        }

        return null;
    }
}
