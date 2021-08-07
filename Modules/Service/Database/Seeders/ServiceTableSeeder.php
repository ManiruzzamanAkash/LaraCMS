<?php

namespace Modules\Service\Database\Seeders;

use Carbon\Carbon;
use Modules\Service\Entities\Service;
use Illuminate\Database\Seeder;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            [
                'title'       => "Laptop/Macbook Repair",
                'slug'        => "laptop-macbook-repair",
                'description' => "In present day time almost every individual works on the laptop, no matter you are a college student, working professional or a businessman. With technological advancements, there are many new ranges and features of laptops seen coming up on the market, but like any other electronic goods, it too needs maintenance and repair. We brings for you customized solution to repair laptops anytime around the country. Our team has enough experience at the back, and they can help repairing any simple or complex laptop problems at ease.
                    <br />
                    We are popular for fast and friendly service, call us anytime, and we will offer laptop services on your doorstep. We are popular because of our customer friendly attitude and quick turnaround time. Apart from that, we offer an affordable solution for all your laptop repairing services. With We, you can find all original and genuine laptop parts and accessories. Our team is reachable around the clock, and we will make sure your device is functioning in quickest possible time.
                    <br />
                    Many clients around the country introduce us as \"laptop specialist\" and its all because of our dedication and professional in solving all problems at ease. We are presently reputed and popular laptop repairing and accessories network in the whole of Australia. At We, we make sure that you laptop repairing experience is easy, fast and hassle free. What's more interesting about our services is that we have a range of utility, quality and fashionable accessories that makeover and protects your close friend – your laptop.
                    <br />
                    Some of our services particularly aimed at for businesses
                    <br />
                    <ul>
                        <li>Desktop support – Maintenance, installation and repair.</li>
                        <li>Software support including installation, registration and provision.</li>
                        <li>Hardware support including provision, installation, set up and repair.</li>
                        <li>Network system set up and configuration.</li>
                        <li>Application support- Web apps, mobile apps, etc.</li>
                        <li>Virus prevention, protection and removal.</li>
                        <li>Server installation and maintenance.</li>
                        <li>WiFi network system set up.</li>
                    </ul>",

                'image'        => 'service-laptop-macbook-repair.jpg',
                'banner_image' => 'service-laptop-macbook-repair-banner.jpg',
                'created_at'   => Carbon::now(),
                'updated_at'   => Carbon::now()
            ],

            [
                'title'       => "Computer Repair",
                'slug'        => "computer-repair",
                'description' => "We can repair all models and ranges of computers.
                Call us now, and our team will provide a great solution for desktops, server, computer, smartphone, game accessories and all peripherals such as cameras, scanners, and printers. Our team responds immediately after getting your call; we will make sure your system is back to work in quickest possible time. Our team is available anytime, and we don't charge anything extra for nights and weekends. Our computer repairing services are based in Australia, and our geeks are all certified computer repairing professionals.
                <br />
                We understand the importance of computer in your life; our experts will make sure that the device is functional in quickest possible time. We assure you of all repairing services; our geeks will reach your home or business location to fix the problem. We provides a full guarantee on work, and we are known in the market for our fast and flawless computer repairing services.
                <br />
                Have full trust on We; our team will never let you down.",

                'image'        => 'service-computer-repair.jpg',
                'banner_image' => 'service-computer-repair-banner.jpg',
                'created_at'   => Carbon::now(),
                'updated_at'   => Carbon::now()
            ],

            [
                'title'       => "Web Application Development",
                'slug'        => "web-application-development",
                'description' => "Services for your future web or mobile applications.
                <br />

                Our services focuses on the following things -
                <ul>
                    <li>Web application development</li>
                    <li>Mobile application development</li>
                    <li>Website Design</li>
                    <li>Mobile App Design</li>
                    <li>Management of business IT infrastructure.</li>
                </ul>
                ",

                'image'        => 'service-web-application.jpg',
                'banner_image' => 'service-web-application-banner.jpg',
                'created_at'   => Carbon::now(),
                'updated_at'   => Carbon::now()
            ],

            [
                'title'       => "Data Backup & Recovery",
                'slug'        => "data-backup-recovery",
                'description' => "We believe in providing the best possible solution for homes as well as businesses. We always believe in meeting the need of our clients and helping them get back to work in quickest possible time. Life is completely dependent on these gadgets these days, and we strive hard to provide an affordable and quality solution for your business and home. All our geeks are skilled and trained to offer top notch services.
                <br />
                We believe all important data are stored in computer systems; We will assure you of data recovery, the storage set up and back up in best possible manner. Our customer data recovery and backup services are designed for home and business; call our geeks today to help you provide the best of deals. Our professionals will make sure you lever lose your precious data by backing it up. We takes up every data recovery assignment with utmost proficiency.
                <br />
                Here are some of the services on offer with us:
                <br />
                We offer data recovery services for all media devices.
                <br />
                <ul>
                    <li>All our data recovery systems are confidential and secure.</li>
                    <li>We assure you of fastest data recovery services in the country.</li>
                    <li>Our team uses some of the best and latest technologies for data recovery.</li>
                    <li>Apart from that our team of geeks will help you by backing up useful files for your home or office.</li>
                </ul>
                ",

                'image'        => 'service-data-recovery.jpg',
                'banner_image' => 'service-data-recovery-banner.jpg',
                'created_at'   => Carbon::now(),
                'updated_at'   => Carbon::now()
            ]
        ];

        Service::insert($services);
    }
}
