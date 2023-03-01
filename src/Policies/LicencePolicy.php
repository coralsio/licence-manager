<?php

namespace Corals\Modules\LicenceManager\Policies;

use Corals\Foundation\Policies\BasePolicy;
use Corals\Modules\LicenceManager\Models\Licence;
use Corals\User\Models\User;

class LicencePolicy extends BasePolicy
{
    /**
     * @param User $user
     * @return bool
     */
    public function view(User $user)
    {
        if ($user->can('LicenceManager::licence.view')) {
            return true;
        }

        return false;
    }

    /**
     * @param User $user
     * @return bool
     */
    public function create(User $user)
    {
        return $user->can('LicenceManager::licence.create');
    }

    /**
     * @param User $user
     * @param Licence $licence
     * @return bool
     */
    public function update(User $user, Licence $licence)
    {
        if ($user->can('LicenceManager::licence.update')) {
            return true;
        }

        return false;
    }

    /**
     * @param User $user
     * @param Licence $licence
     * @return bool
     */
    public function destroy(User $user, Licence $licence)
    {
        if ($user->can('LicenceManager::licence.delete')) {
            return true;
        }

        return false;
    }
}
