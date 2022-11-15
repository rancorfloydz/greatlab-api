<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Accounts;

use App\Enums\Version;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpFoundation\Response;

final class AccountsStoreController extends Controller
{
    public function __invoke(AccountStoreRequest $request, Version $version): JsonResource
    {
        abort_unless(
            $version->greaterThanOrEqualsTo(Version::v1_0),
            Response::HTTP_NOT_FOUND
        );


    }
}
