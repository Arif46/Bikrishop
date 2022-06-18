<?php
/**
 * LaraClassifier - Classified Ads Web Application
 * Copyright (c) BeDigit. All Rights Reserved
 *
 * Website: https://laraclassifier.com
 *
 * LICENSE
 * -------
 * This software is furnished under a license and may be used and copied
 * only in accordance with the terms of such license and with the inclusion
 * of the above copyright notice. If you Purchased from CodeCanyon,
 * Please read the full License from here - http://codecanyon.net/licenses/standard
 */

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\VonageMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use NotificationChannels\Twilio\TwilioChannel;
use NotificationChannels\Twilio\TwilioSmsMessage;

class PhoneVerification extends Notification implements ShouldQueue
{
    use Queueable;
    
    protected $entity;
    protected $entityRef;
    protected $tokenUrl;
    
    public function __construct($entity, $entityRef)
    {
        $this->entity = $entity;
        $this->entityRef = $entityRef;
        
        // Get the Token verification URL
		$path = (isset($entityRef['slug'])) ? $entityRef['slug'] . '/verify/phone' : '';
		$this->tokenUrl = (config('plugins.domainmapping.installed'))
			? dmUrl($this->entity->country_code, $path)
			: url($path);
    }
    
    public function via($notifiable)
    {
        if (!isset($this->entityRef['name'])) {
            return false;
        }
        
        if (config('settings.sms.driver') == 'twilio') {
            return [TwilioChannel::class];
        }
        
        return ['vonage'];
    }
    
    public function toVonage($notifiable)
    {
        return (new VonageMessage())->content($this->smsMessage())->unicode();
    }
    
    public function toTwilio($notifiable)
    {
        return (new TwilioSmsMessage())->content($this->smsMessage());
    }
    
    protected function smsMessage()
    {
        return trans('sms.phone_verification_content', [
            'appName'  => config('app.name'),
            'token'    => $this->entity->phone_token,
            'tokenUrl' => $this->tokenUrl,
        ]);
    }
}