<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Model;

use Werty\Mapping\EmptyObject;

class Contact extends EmptyObject
{
    protected $first_name;
    protected $last_name;
    protected $id;
    protected $type;
    protected $username;

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }
}
