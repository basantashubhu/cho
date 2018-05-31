<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        DB::table('posts')->insert([
            'type_of_application' => 'R',
            'ico_name' => 'Test ICO Name',
            'ico_slogan' => 'Test ico Slogan',
            'website_url' => 'www.testing-purpose.com',
            'country_of_operation' => 'Nepal',
            'link_to_video' => 'www.link-to-video.com',
            'body' => str_random(50).' '.str_random(50),
            'bounty' => 'Available',
            'link_to_bounty' => 'check-my-bounty',
            'minimum_investment' => random_int(1000, 9999),
            'token_name' => str_random(7),
            'token_type' => str_random(7),
            'platform' => str_random(7),
            'pre_ico_price' => str_random(7),
            'current_ico_price' => str_random(7),
            'total_token_sale' => random_int(100,1000),
            'total_token_sold' => random_int(100,1000),
            'restricted_country' => str_random(7),
            'accepting' => str_random(7),
            'soft_cap' => str_random(7),
            'hard_cap' => str_random(7),
            'distributed_ico' => str_random(5),
            'ico_start_date' => date('Y-m-d'),
            'ico_end_date' => Carbon::create('2019', '01', '01'),
            'link_to_whitepaper' => str_random(5),
            'kyc' => 'Y',
            'whitelist' => str_random(5),
            'bonus' => random_int(100,500),
            'pre_sale_bonus' => random_int(100,500),
            'main_sale_bonus' => random_int(100,500),
            'categories' => str_random(3).','.str_random(4).','.str_random(5),
            'facebook_link' => 'www.fb.com'.str_random(5),
            'bitcointalk_link' => 'www.btc.com'.str_random(5),
            'twitter_link' => 'www.twitter.com'.str_random(5),
            'github_link' => 'www.github.com'.str_random(5),
            'medium_link' => 'www.medium.com'.str_random(5),
            'telegram_link' => 'www.telegram.com'.str_random(5),
            'reddit_link' => 'www.reddit.com'.str_random(5),
            'contact_email' => str_random(4).'@gmail.com',
            'published' => random_int(0, 1),
            'user_id' => random_int(1, 10),
            'cover_pic' => str_random(3),
            'post_token' => str_random(10),
        ]);
    }
}










