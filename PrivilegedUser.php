<?php
require_once "User.php";
require_once "Role.php";

class PrivilegedUser extends User
{
    private $roles;
    public function __constructor()
    {
        $this->roles=array();
    }
    public static function getByEmail($email)
    {
        $sql="SELECT * FROM utilisateur WHERE email='$email'";
        $result=queryMySql($sql);
        if($result->num_rows)
        {
            $row=$result->fetch_assoc();
            $privilegedUser=new PrivilegedUser();
            $privilegedUser->id=$row['id'];
            $privilegedUser->email=$row['email'];
            $privilegedUser->motdepasse=$row['motdepasse'];
             $privilegedUser->initRoles($row['id']);
            return $privilegedUser;
        }
        else
        {
            return false;
        }
    }

    public function initRoles($utilisateur_id)
    {
        $sql="SELECT t1.role_id, t2.role_nom FROM utilisateur_roles AS t1
                LEFT JOIN roles AS t2 
                ON t1.role_id=t2.id
                WHERE t1.utilisateur_id=$utilisateur_id";
        $result=queryMySql($sql);
        while($row=$result->fetch_assoc())
        {
            $this->roles[$row['role_nom']]= Role::getRolePerms($row['role_id']);
        }        
    }


public function hasPrivilege($perm)
{
    if($this->roles)
    {
    foreach($this->roles as $role)
    {
        if($role->hasPermission($perm))
        {
            return true;
        }
    }
}
    return false;
}


}