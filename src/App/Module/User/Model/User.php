<?php
declare(strict_types=1);

namespace App\Module\User\Model;

use App\Module\User\Model\Event\UserProfileWasUpdated;
use App\Module\User\Model\Event\UserWasRegistered;
use App\Module\User\Model\Event\PasswordChanged;
use Prooph\EventSourcing\AggregateRoot;

final class User extends AggregateRoot
{
    /**
     * @var UserId
     */
    private $userId;

    /**
     * @var EmailAddress
     */
    private $email;

    /**
     * @var string
     */
    private $password;

    /**
     * @var UserProfile|array
     */
    private $profile;

    /**
     * @var string
     * @Column(type="string", name="nama_perusahaan" nullable=true, options={"default":NULL})
     */
    private $namaPerusahaan = null;

    /**
     * @var string
     */
    private $alamat = null;

    /**
     * @var string
     */
    private $noTlp = null;

    /**
     * @var string
     */
    private $noHp = null;

    /**
     * @var string
     */
    private $npwp = null;

    /**
     * @var string
     */
    private $profileUsaha = null;

    /**
     * @var string
     */
    private $status = null;

    /**
     * @var string
     */
    private $username = null;

    public static function registerWithData(UserId $userId, EmailAddress $email, string $password) : User
    {
        $self = new self();

        $self->recordThat(UserWasRegistered::withData($userId, $email, $password));

        return $self;
    }
    
    public static function resetPassword(string $userId, string $password) : User
    {
        $self = new self();

        $self->recordThat(PasswordChanged::withData($userId, $password));

        return $self;
    }
    
    public function whenPasswordChanged(PasswordChanged $event)
    {
        $this->password = $event->password();
    }

    public function updateProfile(FullName $fullName, Address $address, UserPhone $phone)
    {
        $this->recordThat(UserProfileWasUpdated::withProfile($this->userId, UserProfile::withData(
            $fullName,
            $address,
            $phone
        )));
    }

    public function whenUserWasRegistered(UserWasRegistered $event)
    {
        $this->userId = $event->userId();
        $this->email = $event->email();
        $this->password = $event->password();
        $this->profile = [];
    }

    public function whenUserProfileWasUpdated(UserProfileWasUpdated $event)
    {
        $this->profile = $event->profile();
    }

    protected function aggregateId() : string
    {
        return $this->userId->toString();
    }

    public function userId() : UserId
    {
        return $this->userId;
    }

    public function email() : EmailAddress
    {
        return $this->email;
    }

    public function password() : string
    {
        return $this->password;
    }

    /**
     * @return UserProfile
     */
    public function profile() : UserProfile
    {
        return $this->profile;
    }

    /**
     * @return string
     */
    public function namaPerusahaan() : string
    {
        return $this->namaPerusahaan;
    }

    /**
     * @return string
     */
    public function alamat() : string
    {
        return $this->alamat;
    }

    /**
     * @return string
     */
    public function noTlp() : string
    {
        return $this->noTlp;
    }

    /**
     * @return string
     */
    public function noHp() : string
    {
        return $this->noHp;
    }

    /**
     * @return string
     */
    public function npwp() : string
    {
        return $this->npwp;
    }

    /**
     * @return string
     */
    public function profileUsaha() : string
    {
        return $this->profileUsaha;
    }

    /**
     * @return string
     */
    public function username() : string
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function status() : string
    {
        return $this->status;
    }
}
