<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Accounts;

use App\Enums\Version;
use App\Http\Resources\v1_0\UserResource;use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpFoundation\Response;

final class AccountsUpdateController extends Controller
{
    public function __invoke(AccountUpdateRequest $request, Version $version, User $user): JsonResource
    {
        abort_unless(
            $version->greaterThanOrEqualsTo(Version::v1_0),
            Response::HTTP_NOT_FOUND
        );

        $user->update($request->validated());

        return UserResource::make($user->refresh());
    }
}
