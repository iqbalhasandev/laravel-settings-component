<?php

namespace Database\Seeders;



use App\Models\Setting\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data = [
            [
                'display_name' => 'Title',
                'key'        => 'site.title',
                'value'        => 'Kinoye Express',
                'details'      => '[]',
                'note'      => \null,
                'type'         => 'text',
                'order'        => 1,
                'group'        => 'Site',
            ],
            [
                'display_name' => 'Description',
                'key'        => 'site.description',
                'value'        => \null,
                'details'      => '[]',
                'note'      => \null,
                'type'         => 'text_area',
                'order'        => 2,
                'group'        => 'Site',
            ],
            [
                'display_name' => 'Site Url',
                'key'        => 'site.url',
                'value'        => \null,
                'details'      => '[]',
                'note'      => \null,
                'type'         => 'text',
                'order'        => 3,
                'group'        => 'Site',
            ],
            [
                'display_name' => 'Logo',
                'key'        => 'site.logo',
                'value'        => \null,
                'details'      => '[]',
                'note'      => \null,
                'type'         => 'image',
                'order'        => 4,
                'group'        => 'Site',
            ],
            [
                'display_name' => 'Favicon',
                'key'        => 'site.favicon',
                'value'        => \null,
                'details'      => '[]',
                'note'      => \null,
                'type'         => 'image',
                'order'        => 5,
                'group'        => 'Site',
            ],
            [
                'display_name' => 'Opening Time',
                'key'        => 'site.opening_time',
                'value'        => \null,
                'details'      => '[]',
                'note'      => \null,
                'type'         => 'text',
                'order'        => 6,
                'group'        => 'Site',
            ],
            [
                'display_name' => 'Phone',
                'key'        => 'site.phn',
                'value'        => \null,
                'details'      => '[]',
                'note'      => \null,
                'type'         => 'text',
                'order'        => 7,
                'group'        => 'Site',
            ],
            [
                'display_name' => 'Email',
                'key'        => 'site.email',
                'value'        => \null,
                'details'      => '[]',
                'note'      => \null,
                'type'         => 'text',
                'order'        => 8,
                'group'        => 'Site',
            ],
            [
                'display_name' => 'Address',
                'key'        => 'site.address',
                'value'        => \null,
                'details'      => '[]',
                'note'      => \null,
                'type'         => 'text',
                'order'        => 9,
                'group'        => 'Site',
            ],
            [
                'display_name' => 'Preloader',
                'key'        => 'site.preloader',
                'value'        => 'false',
                'details'      => '{"Active":"true","Inactive":"false"}',
                'note'      => \null,
                'type'         => 'radio_btn',
                'order'        => 10,
                'group'        => 'Site',
            ],
            [
                'display_name' => 'Toster Notice',
                'key'        => 'toster.notice',
                'value'        => \null,
                'details'      => '{"language":"html"}',
                'note'      => \null,
                'type'         => 'code_editor',
                'order'        => 1,
                'group'        => 'Toster',
            ],
            [
                'display_name' => 'Order Assigned SMS Content',
                'key'        => 'sms.assigned_order',
                'value'        => \null,
                'details'      => '{"language":"text"}',
                'note'      => 'Warnning! If you want, you can use the information of the order in the SMS content. For that you can collect the Unique Keys from the link below.

<a href="/admin/order/settings/order-key" target="_blank">Click Here To Collect The Unique Keys Of Use Order Information</a>

Example: You have New Order.Your Order ID is #Order ID#',
                'type'         => 'code_editor',
                'order'        => 1,
                'group'        => 'SMS',
            ],
            [
                'display_name' => 'Crate Order SMS Content',
                'key'        => 'sms.create_order',
                'value'        => \null,
                'details'      => '{"language":"text"}',
                'note'      => 'Warnning! If you want, you can use the information of the order in the SMS content. For that you can collect the Unique Keys from the link below.

<a href="/admin/order/settings/order-key" target="_blank">Click Here To Collect The Unique Keys Of Use Order Information</a>

Example: You have New Order.Your Order ID is #Order ID#',
                'type'         => 'code_editor',
                'order'        => 2,
                'group'        => 'SMS',
            ],
            [
                'display_name' => 'SMS Notification',
                'key'        => 'sms.notify',
                'value'        => 'false',
                'details'      => '{"Active":"true","Inactive":"false"}',
                'note'      => \null,
                'type'         => 'radio_btn',
                'order'        => 3,
                'group'        => 'SMS',
            ],
            [
                'display_name' => 'Merchant Payment Invoice Note',
                'key'        => 'order_invoice.merchant_payment_invoice_note',
                'value'        => \null,
                'details'      => '{"language":"text"}',
                'note'      => \null,
                'type'         => 'code_editor',
                'order'        => 1,
                'group'        => 'Order Invoice',
            ],
            [
                'display_name' => 'Invoice Seal',
                'key'        => 'order_invoice.seal',
                'value'        => \null,
                'details'      => '[]',
                'note'      => \null,
                'type'         => 'image',
                'order'        => 2,
                'group'        => 'Order Invoice',
            ],
            [
                'display_name' => 'Open Weather Map Api Key',
                'key'        => 'api.weather',
                'value'        => \null,
                'details'      => '[]',
                'note'      => \null,
                'type'         => 'text',
                'order'        => 1,
                'group'        => 'API',
            ],
            [
                'display_name' => 'FB Customer Chat',
                'key'        => 'api.fb_chat',
                'value'        => \null,
                'details'      => '[]',
                'note'      => \null,
                'type'         => 'text',
                'order'        => 2,
                'group'        => 'API',
            ],
            [
                'display_name' => 'Google Map Embed URL',
                'key'        => 'api.google_map',
                'value'        => \null,
                'details'      => '[]',
                'note'      => \null,
                'type'         => 'text',
                'order'        => 3,
                'group'        => 'API',
            ],
            [
                'display_name' => 'Linkedin',
                'key'        => 'social.linkedin',
                'value'        => \null,
                'details'      => '[]',
                'note'      => \null,
                'type'         => 'text',
                'order'        => 1,
                'group'        => 'Social',
            ],
            [
                'display_name' => 'Instagram',
                'key'        => 'social.instagram',
                'value'        => \null,
                'details'      => '[]',
                'note'      => \null,
                'type'         => 'text',
                'order'        => 2,
                'group'        => 'Social',
            ],
            [
                'display_name' => 'Twitter',
                'key'        => 'social.twitter',
                'value'        => \null,
                'details'      => '[]',
                'note'      => \null,
                'type'         => 'text',
                'order'        => 3,
                'group'        => 'Social',
            ],
            [
                'display_name' => 'Facebook',
                'key'        => 'social.facebook',
                'value'        => \null,
                'details'      => '[]',
                'note'      => \null,
                'type'         => 'text',
                'order'        => 4,
                'group'        => 'Social',
            ],
            [
                'display_name' => 'Slogan',
                'key'        => 'home_appearance.slogan',
                'value'        => \null,
                'details'      => '[]',
                'note'      => \null,
                'type'         => 'text',
                'order'        => 1,
                'group'        => 'Home Appearance',
            ],
            [
                'display_name' => 'Title',
                'key'        => 'home_appearance.title',
                'value'        => \null,
                'details'      => '[]',
                'note'      => \null,
                'type'         => 'text',
                'order'        => 2,
                'group'        => 'Home Appearance',
            ],
            [
                'display_name' => 'Sub Title',
                'key'        => 'home_appearance.sub_title',
                'value'        => \null,
                'details'      => '[]',
                'note'      => \null,
                'type'         => 'text_area',
                'order'        => 3,
                'group'        => 'Home Appearance',
            ],
            [
                'display_name' => 'Button',
                'key'        => 'home_appearance.button',
                'value'        => '{
    "visibility":"true",
    "label":"Button Text",
    "href":"Link",
    "target":"_self"
}',
                'details'      => '{"language":"json"}',
                'note'      => 'N.B Don\'t Delete any of this Json Formart
                Default Json Formart is:
<code>
{
    "visibility":"true",
    "label":"Button Text",
    "href":"Link",
    "target":"_self"
}
</code>
                ',
                'type'         => 'code_editor',
                'order'        => 4,
                'group'        => 'Home Appearance',
            ],
            [
                'display_name' => 'Image',
                'key'        => 'home_appearance.image',
                'value'        => \null,
                'details'      => '[]',
                'note'      => \null,
                'type'         => 'image',
                'order'        => 1,
                'group'        => '',
            ],
            [
                'display_name' => 'Title',
                'key'        => 'how_it_works_appearance.title',
                'value'        => \null,
                'details'      => '[]',
                'note'      => \null,
                'type'         => 'text',
                'order'        => 1,
                'group'        => 'How It Works Appearance',
            ],
            [
                'display_name' => 'Sub Text',
                'key'        => 'how_it_works_appearance.sub_text',
                'value'        => \null,
                'details'      => '[]',
                'note'      => \null,
                'type'         => 'text_area',
                'order'        => 2,
                'group'        => 'How It Works Appearance',
            ],
            [
                'display_name' => 'Packages',
                'key'        => 'how_it_works_appearance.packages',
                'value'        => '[
    {
        "price":"80",
        "title":"Same Day Delivery",
        "sub_title":"per package",
        "recommended":"false",
        "items":[
            "under 1kg",
            "Within 2 Days",
            "20 Taka Extra per kg"
        ]
    }
]',
                'details'      => '{"language":"json"}',
                'note'      => 'N.B Don\'t Delete any of this Json Formart

Default Json Formart is:
<code>
[
    {
        "price":"80",
        "title":"Same Day Delivery",
        "sub_title":"per package",
        "recommended":"false",
        "items":[
            "under 1kg",
            "Within 2 Days",
            "20 Taka Extra per kg"
        ]
    }
]
</code>',
                'type'         => 'code_editor',
                'order'        => 3,
                'group'        => 'How It Works Appearance',
            ],
            [
                'display_name' => 'Login Page Quote',
                'key'        => 'auth_appearance.login_quote',
                'value'        => \null,
                'details'      => '[]',
                'note'      => \null,
                'type'         => 'text',
                'order'        => 1,
                'group'        => 'Auth Appearance',
            ],
            [
                'display_name' => 'Complete Your Profile Info Quote',
                'key'        => 'auth_appearance.complete_profile_quote',
                'value'        => \null,
                'details'      => '[]',
                'note'      => \null,
                'type'         => 'text_area',
                'order'        => 2,
                'group'        => 'Auth Appearance',
            ],
            [
                'display_name' => 'Registration Merchant Account Quote',
                'key'        => 'auth_appearance.reg_merchant_quote',
                'value'        => \null,
                'details'      => '[]',
                'note'      => \null,
                'type'         => 'text_area',
                'order'        => 3,
                'group'        => 'Auth Appearance',
            ],
            [
                'display_name' => 'Join Us Quote',
                'key'        => 'auth_appearance.join_us_quote',
                'value'        => \null,
                'details'      => '[]',
                'note'      => \null,
                'type'         => 'text_area',
                'order'        => 4,
                'group'        => 'Auth Appearance',
            ],
            [
                'display_name' => 'Registration Rider Account Quote',
                'key'        => 'auth_appearance.reg_rider_quote',
                'value'        => \null,
                'details'      => '[]',
                'note'      => \null,
                'type'         => 'text_area',
                'order'        => 5,
                'group'        => 'Auth Appearance',
            ],
            // [
            //     'display_name' => '',
            //     'key'        => '',
            //     'value'        => \null,
            //     'details'      => '[]',
            //     'note'      => \null,
            //     'type'         => 'text',
            //     'order'        => 1,
            //     'group'        => '',
            // ],

        ];
        foreach ($data as  $item) {
            $setting = $this->findSetting($item['key']);
            if (!$setting->exists) {
                $setting->fill([
                    'display_name' => $item['display_name'],
                    'value'        => $item['value'],
                    'details'      => $item['details'],
                    'note'      => $item['note'],
                    'type'         => $item['type'],
                    'order'        => $item['order'],
                    'group'        => $item['group'],
                ])->save();
            }
        }
    }

    /**
     * [setting description].
     *
     * @param [type] $key [description]
     *
     * @return [type] [description]
     */
    protected function findSetting($key)
    {
        return Setting::firstOrNew(['key' => $key]);
    }
}
