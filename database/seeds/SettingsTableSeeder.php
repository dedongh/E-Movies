<?php

use App\Model\Setting;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{

    protected $settings = [
        [
            'key' => 'site_name',
            'value' => 'TixGo || Cinema, Movies & more',
        ],
        [
            'key' => 'site_title',
            'value' => 'E-Movies',
        ],
        [
            'key' => 'default_email_address',
            'value' => 'admin@tixgo.com',
        ],
        [
            'key' => 'currency_code',
            'value' => 'GHS',
        ],
        [
            'key' => 'currency_symbol',
            'value' => '₵',
        ],
        [
            'key' => 'site_logo',
            'value' => '',
        ],
        [
            'key' => 'site_favicon',
            'value' => '',
        ],
        [
            'key' => 'footer_copyright_text',
            'value' => '',
        ],
        [
            'key' => 'seo_meta_title',
            'value' => '',
        ],
        [
            'key' => 'seo_meta_description',
            'value' => '',
        ],
        [
            'key' => 'social_facebook',
            'value' => '',
        ],
        [
            'key' => 'social_twitter',
            'value' => '',
        ],
        [
            'key' => 'social_instagram',
            'value' => '',
        ],
        [
            'key' => 'social_linkedin',
            'value' => '',
        ],
        [
            'key' => 'google_analytics',
            'value' => '',
        ],
        [
            'key' => 'facebook_pixels',
            'value' => '',
        ],
        [
            'key' => 'flutterwave_client_id',
            'value' => '',
        ],
        [
            'key' => 'flutterwave_secret_id',
            'value' => '',
        ],
        [
            'key' => 'momo_client_id',
            'value' => '',
        ],
        [
            'key' => 'momo_secret_id',
            'value' => '',
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        foreach ($this->settings as $index => $setting) {
            $result = Setting::create($setting);
            if (!$result) {
                $this->command->info("Insert failed at record $index.");
                return;
            }
        }
        $this->command->info('Inserted ' . count($this->settings) . ' records');
    }
}
