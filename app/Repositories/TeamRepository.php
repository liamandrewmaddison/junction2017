<?php

namespace App\Repositories;

class TeamRepository extends Repository
{
    /**
     * @var defaultPermissions - Map for default permissions
     */
    public static $defaultPermissions = [
        'own' => 0,
        'users' => 1,
        'branding' => 1,
        'apps' => 1,
        'settings' => 1,
        'company' => 0,
    ];

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'App\Models\Team';
    }

    /**
     * GET PERMISSIONS
     *
     * Get permissions and re-organsize into better array format
     * All keys are named after each OAuth scope
     * @param $id
     * @return Array - Permissions
     */
    protected function getPermissions($id)
    {
        $team = $this->find($id);
        return [
            'own' => $team->team_own,
            'users' => $team->team_users,
            'branding' => $team->team_branding,
            'apps' => $team->team_apps,
            'settings' => $team->team_settings,
            'company' => $team->team_company,
        ];
    }

    /**
     * GET DEFAULT PERMISSION
     *
     * Get default permission value depending on $key
     * @param $key
     * @return Boolean/Int - Default permission
     */
    public function getDefaultPermission($key)
    {
        return $this->defaultPermissions[$key];
    }

    /**
     * COMPUTE SCOPES
     *
     * Compute user scopes depending on team permissions
     * @param $id
     * @return String - scopes
     */
    public function computeScopes($id)
    {
        $permissions = $this->getPermissions($id);
        $scopes = [];
        if ($permissions['company']) {
            return 'admin';
        }
        foreach ($permissions as $scope => $permission) {
            if ($permission) {
                array_push($scopes, $scope);
            }
        }
        return implode(' ', $scopes);
    }
}