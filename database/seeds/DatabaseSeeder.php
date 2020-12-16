<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    DB::table('tools')->insert(
      [
        [
          "name" => "Python",
          "url" => "https://www.python.org/",
          "image" => "http://localhost:4000/images/tool/1603733477739.png"
        ],
        [
          "name" => "React JS",
          "url" => "https://www.reactjs.org/",
          "image" => "http://localhost:4000/images/tool/1603733431564.png"
        ],
        [
          "name" => "React Native",
          "url" => "https://reactnative.dev/",
          "image" => "http://localhost:4000/images/tool/1603733431564.png"
        ]
      ]
    );

    DB::table('courses')->insert(
      [
        [
          "name" =>  "Premiere Pro Starter",
          "slug" =>  "premiere-pro-starter",
          "certificate" =>  false,
          "type" =>  "free",
          "thumbnail" =>  "http://localhost:4000/images/course/1603732913632.jpg",
          "status" =>  "published",
          "level" =>  "beginner",
          "description" =>  "Adobe Premiere Pro adalah salah satu produk yang digunakan oleh Video Editor untuk melakukan proses manipulasi pada video yang dimilikinya. Seperti menggunakan metode color grading, green screen, trim, transitions, dan juga masih banyak lainnya. Berita baiknya bahwa kita akan mempelajari semua hal tersebut pada kelas Adobe Premiere Pro. Kita akan memulainya dengan mengenal workspace dari software tersebut dan melakukan import video serta audio yang bisa kita dapatkan gratis dari internet. Jika tertarik untuk belajar lebih lanjut silakan bergabung dan akan kami tunggu kalian di kelas ya.",
          "category" => "design",
          "mentor_id" =>  1,
        ],
        [
          "name" => "CSS Bootstrap 4 Web Design",
          "slug" => "css-bootstrap-4-web-design",
          "certificate" => false,
          "type" => "free",
          "thumbnail" => "http://localhost:4000/images/course/1603820139276.jpg",
          "status" => "published",
          "level" => "beginner",
          "description" => "Kelas online website design menggunakan Framework CSS Bootstrap versi 4. Kita akan mempelajari bagaimana caranya untuk convert dari template Adobe XD atau Sketch ke HTML dan CSS menggunakan Framework agar lebih cepat dan juga responsive. Website yang baik adalah ketika pengguna mengakses maka tampilan UI tidak berantakan atau susah dipahami. Menggunakan Framework CSS Bootstrap kita bisa mengatur itu semua dengan lebih mudah. Di sini kita aka membangun website Landing Page dari proses instalasi sampai memiliki website yang cantik (eye-catching) dan user-friendly",
          "category" => "design",
          "mentor_id" => 1,
        ],
        [
          "name" => "Trello Project Management",
          "slug" => "trello-project-management",
          "certificate" => false,
          "type" => "free",
          "thumbnail" => "http://localhost:4000/images/course/1603820014821.jpg",
          "status" => "published",
          "level" => "beginner",
          "description" => "Manajemen projek sangatlah penting untuk dilakukan ketika bekerja sendirian ataupun bersama dengan tim. Manfaat utamanya adalah projek dapat terorganisir dengan baik dan keep on track. Di kelas ini kita akan mempelajari hal tersebut dan berpura-pura sebagai seorang Projek Manager. Kita akan menggunakan Trello (bisa diakses di mana saja) sebagai tool utama dalam manajemen projek. Di sini kita akan pelajari dari dasar sampai bisa memberikan tugas dan deadline kepada setiap member yang ada pada tim. Silakan bergabung dan akan kami tunggu di kelas.",
          "category" => "development",
          "mentor_id" => 1,
        ],
        [
          "name" => "Node JavaScript Basic",
          "slug" => "node-javascript-basic",
          "certificate" => false,
          "type" => "free",
          "thumbnail" => "http://localhost:4000/images/course/1603732901957.jpg",
          "status" => "published",
          "level" => "beginner",
          "description" => "Node js adalah platform buatan Ryan Dahl untuk menjalankan aplikasi web berbasis JavaScript yang dikenalkan pada tahun 2009. Dengan node js kita dapat menjalankan JavaScript dari sisi server. Node js memiliki banyak banyak framework yang dapat memudahkan dan mempercepat pengerjaan pembuatan website, salah satu framework node js yaitu express js. express js adalah satu web framework paling populer di dunia Node.js",
          "category" => "development",
          "mentor_id" => 1,
        ],
        [
          "name" => "React JavaScript",
          "slug" => "react-javascript",
          "certificate" => false,
          "type" => "premium",
          "thumbnail" => "http://localhost:4000/images/course/1603732893144.jpg",
          "status" => "published",
          "level" => "intermediate",
          'price' => 350000,
          "description" => "React JS adalah library JavaScript yang digunakan oleh web developer dalam membangun website yang lebih interactive, fast, dan responsive. Library ini sering digunakan untuk membuat Single Page Application (SPA). Di kelas gratis ini kita akan membangun toko online sederhana dengan menggunakan HTML, CSS, JavaScript (React JS). Tentunya kita akan mempelajari dasar dari penggunaan library ini pada website kita seperti Components, Props, Events, Conditional, dan masih banyak lainnya.",
          "category" => "development",
          "mentor_id" => 1,
        ]
      ]
    );

    DB::table('course_tools')->insert(
      [
        [
          "course_id" => 2, "tool_id" => 1
        ],
        [
          "course_id" => 3, "tool_id" => 1
        ],
        [
          "course_id" => 4, "tool_id" => 1
        ],
        [
          "course_id" => 5, "tool_id" => 2
        ],
        [
          "course_id" => 5, "tool_id" => 3
        ]
      ]
    );

    DB::table('flow')->insert(
      [
        [
          "name" => "Full-Stack Javascript Developer",
          "level" => "intermediate",
          "image" => "http://localhost:4000/images/course/1603732893144.jpg",
        ],
        [
          "name" => "Full-Stack Web Designer",
          "level" => "beginner",
          "image" => "http://localhost:4000/images/course/1603732893144.jpg",
        ],
      ]
    );

    DB::table('course_flow')->insert(
      [
        [
          "flow_id" => 1, "course_id" => 1
        ],
        [
          "flow_id" => 1, "course_id" => 2
        ],
        [
          "flow_id" => 2, "course_id" => 1
        ],
        [
          "flow_id" => 2, "course_id" => 2
        ],
        [
          "flow_id" => 2, "course_id" => 3
        ]
      ]
    );
  }
}
