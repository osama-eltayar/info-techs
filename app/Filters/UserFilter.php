<?php


namespace App\Filters;


use Filter\Filter;

class UserFilter extends Filter
{
    public function filterName($name)
    {
        $this->query->where('name', 'like', "%$name%");
    }

    public function filterEmail($email)
    {
        $this->query->where('email', 'like', "%$email%");
    }

    public function filterCreatedAt($created_at)
    {
        $this->query->whereDate('created_at', '>', $created_at);
    }

    public function filterStatus($status)
    {
        if ($status == 1) {
            $this->query->whereNotNull('email_verified_at');
        } else {
            $this->query->whereNull('email_verified_at');
        }
    }
}
