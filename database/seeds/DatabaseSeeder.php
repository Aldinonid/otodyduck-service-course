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
          "name" => "Node JS",
          "url" => "https://nodejs.org/",
          "image" => "http://45.32.102.238/images/tool/1614156924435.png"
        ],
        [
          "name" => "React JS",
          "url" => "https://www.reactjs.org/",
          "image" => "http://45.32.102.238/images/tool/1614156877821.png"
        ],
        [
          "name" => "Figma",
          "url" => "https://www.figma.com/",
          "image" => "http://45.32.102.238/images/tool/1614156943659.png"
        ],
        [
          "name" => "Visual Studio Code",
          "url" => "https://code.visualstudio.com/download",
          "image" => "http://45.32.102.238/images/tool/1614156988072.png"
        ],
        [
          "name" => "XCode",
          "url" => "https://developer.apple.com/xcode/",
          "image" => "http://45.32.102.238/images/tool/1614157114590.png"
        ],
        [
          "name" => "SwiftUI",
          "url" => "https://developer.apple.com/xcode/swiftui/",
          "image" => "http://45.32.102.238/images/tool/1614157136069.png"
        ],
        [
          "name" => "Swfit",
          "url" => "https://developer.apple.com/swift/",
          "image" => "http://45.32.102.238/images/tool/1614157150445.png"
        ],
        [
          "name" => "Atom",
          "url" => "https://atom.io/",
          "image" => "http://45.32.102.238/images/tool/1614157235207.png"
        ],
        [
          "name" => "Git Bash",
          "url" => "https://git-scm.com/downloads",
          "image" => "http://45.32.102.238/images/tool/1614164704542.png"
        ],
        [
          "name" => "Mongo DB",
          "url" => "https://www.mongodb.com/",
          "image" => "http://45.32.102.238/images/tool/1614179362247.png"
        ],
        [
          "name" => "Trello",
          "url" => "https://trello.com/en",
          "image" => "http://45.32.102.238/images/tool/1614181194307.png"
        ],
      ]
    );

    DB::table('courses')->insert(
      [
        [
          "name" =>  "Belajar Dasar React JS",
          "slug" =>  "belajar-dasar-react-js",
          "certificate" =>  false,
          "type" =>  "free",
          "thumbnail" =>  "http://45.32.102.238/images/course/1614157960333.jpg",
          "status" =>  "published",
          "level" =>  "all level",
          "price" => 0,
          "description" =>  "ReactJS adalah library javascript yang bisa memudahkan kamu membuat tampilan UI yang interaktif (satu data yang sama bisa saling berkomunikasi), dimana bagian bagiannya nanti akan dibentuk dalam komponen agar mudah dipakai berkali-kali. Tentu kamu ngga mau membuat struktur yang sama dipakai diberabagai bagian aplikasi kamu berulang kali. Sudah beberapa tahun akhir ini reactjs unggul dari segi popularitas dan permintaan lowogan pekerjaan termasuk di Indonesia. Tidak ada salahnya kamu untuk mulai belajar react js dari dasar sekarang. Jangan lupa kamu perlu familiar dengan javascript dan penulisan es6 sebelumnya",
          "category" => "development",
          "mentor_id" =>  1,
        ],
        [
          "name" => "Belajar NodeJS",
          "slug" => "belajar-nodejs",
          "certificate" => false,
          "type" => "free",
          "thumbnail" => "http://45.32.102.238/images/course/1614163594467.jpg",
          "status" => "published",
          "level" => "all level",
          "price" => 0,
          "description" => "Node js adalah platform buatan Ryan Dahl untuk menjalankan aplikasi web berbasis JavaScript yang dikenalkan pada tahun 2009. Dengan node js kita dapat menjalankan JavaScript dari sisi server. Node js memiliki banyak banyak framework yang dapat memudahkan dan mempercepat pengerjaan pembuatan website, salah satu framework node js yaitu express js. express js adalah satu web framework paling populer di dunia Node.js",
          "category" => "development",
          "mentor_id" => 4,
        ],
        [
          "name" => "Belajar GIT",
          "slug" => "belajar-git",
          "certificate" => false,
          "type" => "free",
          "thumbnail" => "http://45.32.102.238/images/course/1614164785828.jpg",
          "status" => "published",
          "level" => "all level",
          "price" => 0,
          "description" => "Git adalah serangkaian program utilitas command line yang dirancang untuk dijalankan pada lingkungan command line style Unix. Sistem operasi modern, seperti Linux dan macOS, keduanya termasuk terminal command line built-in Unix. Hal ini membuat Linux dan sistem operasi MacOS saling melengkapi saat bekerja dengan Git. Microsoft Windows sebagai gantinya menggunakan command prompt Windows, lingkungan terminal non-Unix. Yuk baca sampai selesai Apa Itu Git Bash Dalam lingkungan Windows, Git sering dikemas sebagai bagian dari aplikasi GUI tingkat tinggi. GUI untuk Git dapat mencoba abstrak dan menyembunyikan versi primitif sistem kontrol yang mendasarinya. Git Bash adalah aplikasi untuk lingkungan Microsoft Windows yang menyediakan lapisan emulasi untuk pengalaman Git command line. Bash adalah akronim untuk Bourne Again Shell. Shell adalah aplikasi terminal yang digunakan untuk berinteraksi dengan sistem operasi melalui perintah tertulis. Bash adalah shell default populer di Linux dan macOS. Git Bash adalah paket yang menginstal Bash, beberapa utilitas bash umum, dan Git pada sistem operasi Windows.",
          "category" => "development",
          "mentor_id" => 4,
        ],
        [
          "name" => "Kelas Online iOS Development Menggunakan Swift UI",
          "slug" => "kelas-online-ios-development-menggunakan-swift-ui",
          "certificate" => false,
          "type" => "premium",
          "thumbnail" => "http://45.32.102.238/images/course/1614178067082.jpg",
          "status" => "published",
          "level" => "intermediate",
          "price" => 450000,
          "description" => "Dalam membangun aplikasi iOS yang digunakan untuk iPhone atau juga iPad, maka kita membutuhkan sebuah bahasa pemrograman dan di sini akan kita pelajari dari dasar. Kita akan coba menggunakan SwiftUI untuk membangun aplikasi iOS. Kita akan coba mempelajarinya mulai dari mengenal tipe data, menggunakan beberapa komponen yang telah disediakan, dan juga masih banyak lainnya. Silakan bergabung karena kelas SwiftUI ini gratis untuk siapa saja yang ingin belajar. Baik, saya tunggu di kelas ya!",
          "category" => "development",
          "mentor_id" => 5,
        ],
        [
          "name" => "iOS Swift Dasar",
          "slug" => "ios-swift-dasar",
          "certificate" => false,
          "type" => "free",
          "thumbnail" => "http://45.32.102.238/images/course/1614178766687.jpg",
          "status" => "published",
          "level" => "all level",
          "price" => 0,
          "description" => "Swift adalah bahasa pemrograman yang kokoh dan intuitif yang diciptakan Apple untuk mengembangkan aplikasi untuk iOS, Mac, Apple TV, dan Apple Watch. Bahasa ini didesain untuk memberikan lebih banyak kebebasan kepada pengembang. Swift mudah digunakan dan bersifat sumber terbuka, jadi siapa pun yang memiliki ide dapat menciptakan sesuatu yang luar biasa.",
          "category" => "development",
          "mentor_id" => 5,
        ],
        [
          "name" => "MongoDB Basic",
          "slug" => "mongodb-basic",
          "certificate" => false,
          "type" => "free",
          "thumbnail" => "http://45.32.102.238/images/course/1614179479164.jpg",
          "status" => "published",
          "level" => "all level",
          "price" => 0,
          "description" => "MongoDB merupakan salah satu database NoSQL dengan basis dokumen yang sangat populer saat ini, MongoDB didirikan oleh tiga serangkai yang terdiri dari Kevin Ryan, Eliot Horowitz, dan Dwight Meriman. Ketiganya tergabung di MongoDB Inc. dan berperan pada jabatannya masing — masing. Kevin menjabat board member, Dwight Merriman menjabat sebagai chairman, dan Eliot menjabat sebagai CTO di MongoDB Inc. MongoDB menawarkan fitur high performance, high availability, dan automatic scaling, MongoDB menggunakan Javascript untuk melakukan operasi seperti CRUD, agregasi, indexing, dan operasi database lainnya, karena MongoDB menggunakan javascript maka dalam penyimpanan datanya MongoDB tidak menggunakan table, tetapi MongoDB menyimpan datanya dalam suatu dokumen yang strukturnya seperti JSON.",
          "category" => "development",
          "mentor_id" => 6,
        ],
        [
          "name" => "Figma UI Design",
          "slug" => "figma-ui-design",
          "certificate" => false,
          "type" => "premium",
          "thumbnail" => "http://45.32.102.238/images/course/1614180058194.jpg",
          "status" => "published",
          "level" => "all level",
          "price" => 150000,
          "description" => "Kelas yang akan mempelajari aplikasi design gratis yaitu Figma sebagai alternatif Adobe XD atau Sketch yang tidak kalah keren. Figma ini aplikasi website yang digunakan oleh UI atau UX designer dalam membuat tampilan antarmuka untuk website dan mobile apps.",
          "category" => "development",
          "mentor_id" => 7,
        ],
        [
          "name" => "Trello Project Management",
          "slug" => "trello-project-management",
          "certificate" => false,
          "type" => "free",
          "thumbnail" => "http://45.32.102.238/images/course/1614181282215.jpg",
          "status" => "published",
          "level" => "all level",
          "price" => 0,
          "description" => "Manajemen projek sangatlah penting untuk dilakukan ketika bekerja sendirian ataupun bersama dengan tim. Manfaat utamanya adalah projek dapat terorganisir dengan baik dan keep on track. Di kelas ini kita akan mempelajari hal tersebut dan berpura-pura sebagai seorang Projek Manager. Kita akan menggunakan Trello (bisa diakses di mana saja) sebagai tool utama dalam manajemen projek. Di sini kita akan pelajari dari dasar sampai bisa memberikan tugas dan deadline kepada setiap member yang ada pada tim. Silakan bergabung dan akan kami tunggu di kelas.",
          "category" => "soft skill",
          "mentor_id" => 7,
        ],
        [
          "name" => "HTML5 Basic",
          "slug" => "html5-basic",
          "certificate" => false,
          "type" => "free",
          "thumbnail" => "http://45.32.102.238/images/course/1614182051234.jpg",
          "status" => "published",
          "level" => "all level",
          "price" => 0,
          "description" => "HTML5 adalah bahasa markup yang digunakan untuk membangun suatu tampilan pada Website. HTML5 ini peran nya seperti pondasi utama ketika Website sedang berada pada tahap Development. Ketika kita ingin membuat sebuah Header, Body, dan juga Footer pada Website maka kita perlu menggunakan bahasa markup ini. Kelas HTML5 dasar ini akan membawa kalian untuk berkenalan terlebih dahulu tentang bagaimana cara membangun suatu Website dengan mudah. Karena nanti pastinya kita juga akan mempelajari ilmu lebih dalam seperti menggunakan Framework CSS layaknya Bootstrap atau Bulma CSS. Pokoknya untuk kalian yang ingin belajar Web Development tapi masih bingung untuk memulainya dari mana maka jawabannya adalah kelas HTML5 Dasar ini. Silahkan bergabung karena kelas ini gratis untuk siapa saja.",
          "category" => "development",
          "mentor_id" => 1,
        ],
        [
          "name" => "Javascript Lanjutan (ES6)",
          "slug" => "javascript-lanjutan-(es6)",
          "certificate" => false,
          "type" => "free",
          "thumbnail" => "http://45.32.102.238/images/course/1614182515816.jpg",
          "status" => "published",
          "level" => "intermediate",
          "price" => 0,
          "description" => "Dalam membangun website yang dinamis (memiliki konten yang up to date) maka kita akan membutuhkan bahasa pemrograman website yaitu salah satunya adalah JavaScript. Di sini kita akan mengenal dasar-dasar penggunaan JavaScript pada website development. Dimulai dari mengenal tipe data, membuat fungsi, dan juga masih banyak yang lainnya. JavaScript sangat diperlukan jika memang kita ingin menjadi seorang Front-End Developer yang di mana nantinya kita juga akan mempelajari framework JavaScript yang popular di antaranya adalah Angular, React, Vue, dan Svelte.",
          "category" => "development",
          "mentor_id" => 4,
        ],
      ]
    );

    DB::table('course_tools')->insert(
      [
        [
          "course_id" => 1, "tool_id" => 1
        ],
        [
          "course_id" => 1, "tool_id" => 2
        ],
        [
          "course_id" => 1, "tool_id" => 8
        ],
        [
          "course_id" => 2, "tool_id" => 2
        ],
        [
          "course_id" => 2, "tool_id" => 4
        ],
        [
          "course_id" => 3, "tool_id" => 9
        ],
        [
          "course_id" => 4, "tool_id" => 5
        ],
        [
          "course_id" => 4, "tool_id" => 6
        ],
        [
          "course_id" => 4, "tool_id" => 7
        ],
        [
          "course_id" => 5, "tool_id" => 5
        ],
        [
          "course_id" => 5, "tool_id" => 7
        ],
        [
          "course_id" => 6, "tool_id" => 10
        ],
        [
          "course_id" => 7, "tool_id" => 3
        ],
        [
          "course_id" => 8, "tool_id" => 11
        ],
        [
          "course_id" => 9, "tool_id" => 8
        ],
        [
          "course_id" => 10, "tool_id" => 4
        ],
      ]
    );

    DB::table('flow')->insert(
      [
        [
          "name" => "Full-Stack Javascript Developer",
          "slug" => "full-stack-javascript-developer",
          "level" => "all level",
          "image" => "http://45.32.102.238/images/flow/1614184553189.jpg",
        ]
      ]
    );

    DB::table('course_flows')->insert(
      [
        [
          "flow_id" => 1, "course_id" => 9
        ],
        [
          "flow_id" => 1, "course_id" => 10
        ],
        [
          "flow_id" => 1, "course_id" => 2
        ],
        [
          "flow_id" => 1, "course_id" => 6
        ],
        [
          "flow_id" => 1, "course_id" => 1
        ]
      ]
    );

    DB::table('chapters')->insert(
      [
        [
          "name" => "Introduction",
          "course_id" => 1
        ],
        [
          "name" => "Dasar React",
          "course_id" => 1
        ],
        [
          "name" => "Intro",
          "course_id" => 2
        ],
        [
          "name" => "Node JS Basic",
          "course_id" => 2
        ],
        [
          "name" => "Belajar Github",
          "course_id" => 3
        ],
        [
          "name" => "Persiapan",
          "course_id" => 4
        ],
        [
          "name" => "Work in Project",
          "course_id" => 4
        ],
        [
          "name" => "Swift Basic",
          "course_id" => 5
        ],
        [
          "name" => "Persiapan",
          "course_id" => 6
        ],
        [
          "name" => "Mongo DB Basic",
          "course_id" => 6
        ],
        [
          "name" => "Basic Figma",
          "course_id" => 7
        ],
        [
          "name" => "Persiapan",
          "course_id" => 8
        ],
        [
          "name" => "Let's Manage",
          "course_id" => 8
        ],
        [
          "name" => "HTML5 Dasar",
          "course_id" => 4
        ],
        [
          "name" => "Object",
          "course_id" => 10
        ],
        [
          "name" => "Closure",
          "course_id" => 10
        ],
        [
          "name" => "Function",
          "course_id" => 10
        ],
        [
          "name" => "String",
          "course_id" => 10
        ],
      ]
    );

    DB::table('lessons')->insert(
      [
        [
          "name" => "Apa itu, kenapa dan cara install reactjs",
          "video" => "ZNVRETPPW24",
          "chapter_id" => 1
        ],
        [
          "name" => "Apa itu jsx",
          "video" => "U1Yle8E5A34",
          "chapter_id" => 2
        ],
        [
          "name" => "Component dan props di react",
          "video" => "eTfLzinxpTQ",
          "chapter_id" => 2
        ],
        [
          "name" => "State di react",
          "video" => "OAV31Q05LXg",
          "chapter_id" => 2
        ],
        [
          "name" => "Handle event react js",
          "video" => "hLRhChlZ3ws",
          "chapter_id" => 2
        ],
        [
          "name" => "Membuat todolist reactjs",
          "video" => "9L2CSs2R2y4",
          "chapter_id" => 2
        ],
        [
          "name" => "Immutable di reactjs",
          "video" => "G-Q4T3wxAcA",
          "chapter_id" => 2
        ],
        [
          "name" => "Konsumsi API dengan react",
          "video" => "Onlytm6QXhA",
          "chapter_id" => 2
        ],
        [
          "name" => "Halaman SPA dan routing dengan react router dom",
          "video" => "8-8699YfFZ0",
          "chapter_id" => 2
        ],
        [
          "name" => "React fragment sebagai pembungkus",
          "video" => "eG_pY3JnTXM",
          "chapter_id" => 2
        ],
        [
          "name" => "Hosting react di github pages",
          "video" => "20PmETlwZd4",
          "chapter_id" => 2
        ],
        [
          "name" => "Apa Itu NodeJS?",
          "video" => "sSLJx5t4OJ4",
          "chapter_id" => 3
        ],
        [
          "name" => "Arsitektur NodeJS",
          "video" => "wcQaspZE-20",
          "chapter_id" => 3
        ],
        [
          "name" => "Instalasi & Konfigurasi NodeJS",
          "video" => "VfN1_pEdQAA",
          "chapter_id" => 3
        ],
        [
          "name" => "Node REPL (Read - Eval - Print - Loop)",
          "video" => "74a8L0HZE-Q",
          "chapter_id" => 4
        ],
        [
          "name" => "Menjalankan File Node",
          "video" => "Fa2BggXYE24",
          "chapter_id" => 4
        ],
        [
          "name" => "NodeJS Module System",
          "video" => "9hT29YQuB2U",
          "chapter_id" => 4
        ],
        [
          "name" => "NodeJS Core Module",
          "video" => "PzjGJFUjms4",
          "chapter_id" => 4
        ],
        [
          "name" => "APA ITU GIT & GITHUB?",
          "video" => "lTMZxWMjXQU",
          "chapter_id" => 5
        ],
        [
          "name" => "BEKERJA DENGAN GITHUB",
          "video" => "Q3Id0DgcrXY",
          "chapter_id" => 5
        ],
        [
          "name" => "GITHUB : BRANCH",
          "video" => "k1QXd-8VbPY",
          "chapter_id" => 5
        ],
        [
          "name" => "GITHUB : FORK",
          "video" => "8rry2ncZmfg",
          "chapter_id" => 5
        ],
        [
          "name" => "BEKERJA DENGAN GIT",
          "video" => "e-6OkXRqWaE",
          "chapter_id" => 5
        ],
        [
          "name" => "GIT BRANCH & MERGE",
          "video" => "EGl7KxVOyNs",
          "chapter_id" => 5
        ],
        [
          "name" => "GIT MERGE CONFLICT",
          "video" => "Vfwfeve72PA",
          "chapter_id" => 5
        ],
        [
          "name" => "GIT REMOTE",
          "video" => "ppi_M-FX1CY",
          "chapter_id" => 5
        ],
        [
          "name" => "GITHUB PAGES / NGOBAR#12 : Web Hosting Gratis dengan GitHub Pages",
          "video" => "rgDDWhQe-ow",
          "chapter_id" => 5
        ],
        [
          "name" => "MULTIPLE REMOTES",
          "video" => "XeOf2wdnFlc",
          "chapter_id" => 5
        ],
        [
          "name" => "GREMOTE BRANCH",
          "video" => "4OLGYv3uVV4",
          "chapter_id" => 5
        ],
        [
          "name" => "GITIGNORE",
          "video" => "LK3kX4n-vLM",
          "chapter_id" => 5
        ],
        [
          "name" => "GIT REBASE",
          "video" => "4kJrcuIvbOo",
          "chapter_id" => 5
        ],
        [
          "name" => "GIT & WEB HOSTING",
          "video" => "N7vbVc3oQqI",
          "chapter_id" => 5
        ],
        [
          "name" => "Introduction",
          "video" => "17j98163pE4",
          "chapter_id" => 6
        ],
        [
          "name" => "StackView",
          "video" => "DEdSEgGe0KA",
          "chapter_id" => 7
        ],
        [
          "name" => "Bekerja dengan Form dan Navigation",
          "video" => "0TOJonGOG7U",
          "chapter_id" => 7
        ],
        [
          "name" => "Membuat Custom NavigationView",
          "video" => "LbjS9F5QQQA",
          "chapter_id" => 7
        ],
        [
          "name" => "Bekerja dengan List (Youtube App)",
          "video" => "00GcB1ARLw4",
          "chapter_id" => 7
        ],
        [
          "name" => "Bekerja dengan TabView (Youtube App UI)",
          "video" => "_0n71eT4ZuE",
          "chapter_id" => 7
        ],
        [
          "name" => "Property View (Like Props)",
          "video" => "VaaBYyKNiAE",
          "chapter_id" => 7
        ],
        [
          "name" => "Data Model",
          "video" => "sIbJyBQusgE",
          "chapter_id" => 7
        ],
        [
          "name" => "Memahami State dan Binding",
          "video" => "10OXbr3FeWI",
          "chapter_id" => 7
        ],
        [
          "name" => "Memahami Observable Object",
          "video" => "f-w404TtJUY",
          "chapter_id" => 7
        ],
        [
          "name" => "Memahami Environment Object",
          "video" => "DjwjBt3NwwY",
          "chapter_id" => 7
        ],
        [
          "name" => "Geometry Reader",
          "video" => "dI49l6_uDIg",
          "chapter_id" => 7
        ],
        [
          "name" => "TapGesture",
          "video" => "NWuzAry4m7o",
          "chapter_id" => 7
        ],
        [
          "name" => "Drag Gesture",
          "video" => "AAjJNbEIIyk",
          "chapter_id" => 7
        ],
        [
          "name" => "Draw Shape",
          "video" => "Pm0obSz5ZCg",
          "chapter_id" => 7
        ],
        [
          "name" => "Fetch JSON Data (GET Request)",
          "video" => "k-k9hbBuRPo",
          "chapter_id" => 7
        ],
        [
          "name" => "Fetch Nested JSON Data Covid 19 API",
          "video" => "BJT0Rhz99UU",
          "chapter_id" => 7
        ],
        [
          "name" => "Activity Indicator Fetch JSON Covid19 Data",
          "video" => "B2LKncOgRXg",
          "chapter_id" => 7
        ],
        [
          "name" => "HTTP POST Request (Login Page)",
          "video" => "d8AV1YZ1_vc",
          "chapter_id" => 7
        ],
        [
          "name" => "Menampilkan Data Login (POST)",
          "video" => "0DDk8xGrNyY",
          "chapter_id" => 7
        ],
        [
          "name" => "Menampilkan Data Login (POST)",
          "video" => "0DDk8xGrNyY",
          "chapter_id" => 7
        ],
        [
          "name" => "Error Domain Network Handling",
          "video" => "_YTIvQNgpI0",
          "chapter_id" => 7
        ],
        [
          "name" => "Network Checking (NWPath Monitor)",
          "video" => "-m6y8aOowKs",
          "chapter_id" => 7
        ],
        [
          "name" => "List Dinamis (onDelete, onMove, onAdd, onUpdate)",
          "video" => "wAPd51HhngI",
          "chapter_id" => 7
        ],
        [
          "name" => "Load Image from JSON URL with Swift Package",
          "video" => "G9sqqjBwoq4",
          "chapter_id" => 7
        ],
        [
          "name" => "Basic Operator pada Swift",
          "video" => "UGfuk2H1cl8",
          "chapter_id" => 8
        ],
        [
          "name" => "Penggunaan String pada Swift",
          "video" => "4yydMIUwo74",
          "chapter_id" => 8
        ],
        [
          "name" => "Pengunaan Array pada Swift",
          "video" => "cjlhyaj0CpI",
          "chapter_id" => 8
        ],
        [
          "name" => "Penggunaan Set pada Swift",
          "video" => "mkeOgWr0etg",
          "chapter_id" => 8
        ],
        [
          "name" => "Penggunaan Dictionary",
          "video" => "4aJxLszuVU0",
          "chapter_id" => 8
        ],
        [
          "name" => "For Loop",
          "video" => "FGsy-hzDWdg",
          "chapter_id" => 8
        ],
        [
          "name" => "Pengenalan MongoDB",
          "video" => "JXXUBiJGu94",
          "chapter_id" => 10
        ],
        [
          "name" => "Menginstall MongoDB",
          "video" => "E4MHb_ctVKA",
          "chapter_id" => 10
        ],
        [
          "name" => "MongoDB Client",
          "video" => "wuQoq0-f4kQ",
          "chapter_id" => 10
        ],
        [
          "name" => "Database",
          "video" => "apa-CmxYVyY",
          "chapter_id" => 10
        ],
        [
          "name" => "Collection",
          "video" => "VbguzSZfvaE",
          "chapter_id" => 11
        ],
        [
          "name" => "Data Model",
          "video" => "RURinfDM8cA",
          "chapter_id" => 11
        ],
        [
          "name" => "BSON",
          "video" => "P9T_V2h60cY",
          "chapter_id" => 11
        ],
        [
          "name" => "Insert Document",
          "video" => "WRK_jXywV1Y",
          "chapter_id" => 11
        ],
        [
          "name" => "Query Document",
          "video" => "3An0AfYyZAM",
          "chapter_id" => 11
        ],
        [
          "name" => "Comparison Query Operator",
          "video" => "M3Ho4djinHE",
          "chapter_id" => 11
        ],
        [
          "name" => "Logical Query Operator",
          "video" => "9bwQA68o7nQ",
          "chapter_id" => 11
        ],
        [
          "name" => "Element Query Operator",
          "video" => "Qm5PHB0ZAXw",
          "chapter_id" => 11
        ],
        [
          "name" => "Evaluation Query Operator",
          "video" => "MyM_Qa4mCGM",
          "chapter_id" => 11
        ],
        [
          "name" => "Array Query Operator",
          "video" => "XG3-0TdxuG",
          "chapter_id" => 11
        ],
        [
          "name" => "Projection Operator",
          "video" => "XLkZI244vnM",
          "chapter_id" => 11
        ],
        [
          "name" => "Perkenalan Aplikasi Design",
          "video" => "wE-eGh8gWAk",
          "chapter_id" => 12
        ],
        [
          "name" => "Mempelajari Layers dan Group",
          "video" => "CIUjNIEj2sI",
          "chapter_id" => 12
        ],
        [
          "name" => "Image & Color Scheme",
          "video" => "2_yBfdSfrEI",
          "chapter_id" => 12
        ],
        [
          "name" => "Text Tool & Margins",
          "video" => "qqrR-tn9kCA",
          "chapter_id" => 12
        ],
        [
          "name" => "Belajar UI Prototype",
          "video" => "jaLhTcc1D5M",
          "chapter_id" => 12
        ],
        [
          "name" => "Belajar UI Prototype Part 2",
          "video" => "ex6GsDnqysw",
          "chapter_id" => 12
        ],
        [
          "name" => "Belajar UI Prototype Part 3",
          "video" => "BdHvlAePR-Y",
          "chapter_id" => 12
        ],
        [
          "name" => "Fungsi dan Membuat Component di Figma",
          "video" => "9i2YDbd68_4",
          "chapter_id" => 12
        ],
        [
          "name" => "Trailer",
          "video" => "KbN62Z67IYo",
          "chapter_id" => 13
        ],
        [
          "name" => "Kanban",
          "video" => "CCl8kzRTLy8",
          "chapter_id" => 14
        ],
        [
          "name" => "New Project",
          "video" => "4r6AiSh_7QI",
          "chapter_id" => 14
        ],
        [
          "name" => "Invite Team Members",
          "video" => "YGksHRVHYRE",
          "chapter_id" => 14
        ],
        [
          "name" => "New Section",
          "video" => "AjceRis1xw0",
          "chapter_id" => 14
        ],
        [
          "name" => "Tugas Baru",
          "video" => "10QA3PTE_wo",
          "chapter_id" => 14
        ],
        [
          "name" => "Add Attachment",
          "video" => "9y53bDWVPR8",
          "chapter_id" => 14
        ],
        [
          "name" => "Membuat Deadline",
          "video" => "9yoSsNq2Xuw",
          "chapter_id" => 14
        ],
        [
          "name" => "Install Power-Ups",
          "video" => "PdK-gr2H7qs",
          "chapter_id" => 14
        ],
        [
          "name" => "Special Character",
          "video" => "FWMh8PGqm3s",
          "chapter_id" => 14
        ],
        [
          "name" => "Summary",
          "video" => "RimcMcGq1jY",
          "chapter_id" => 14
        ],
        [
          "name" => "Struktur Dasar",
          "video" => "kgvFp-IBz8I",
          "chapter_id" => 15
        ],
        [
          "name" => "Strutkur Baru HTML5",
          "video" => "ZTG1JyB-OB0",
          "chapter_id" => 15
        ],
        [
          "name" => "Caption Pada Gambar",
          "video" => "eZYkTvPHLGA",
          "chapter_id" => 15
        ],
        [
          "name" => "Dialog Dan Detail",
          "video" => "MdLIQ7hDRII",
          "chapter_id" => 15
        ],
        [
          "name" => "Input Baru Di HTML5",
          "video" => "R3PW1x-CJjE",
          "chapter_id" => 15
        ],
        [
          "name" => "Memasukkan Video Pada Website",
          "video" => "_tha-nVgZwA",
          "chapter_id" => 15
        ],
        [
          "name" => "Menggunakan Audio",
          "video" => "KUJ6BIPWq2Q",
          "chapter_id" => 15
        ],
        [
          "name" => "Ke Mana?",
          "video" => "2DBmkUtWeOw",
          "chapter_id" => 15
        ],
        [
          "name" => "1.1 OBJECT",
          "video" => "RwT41El778A",
          "chapter_id" => 16
        ],
        [
          "name" => "1.2 Object.create()",
          "video" => "3pQ7Qpzl_pY",
          "chapter_id" => 16
        ],
        [
          "name" => "1.3 Prototype",
          "video" => "2CQhh_6xU3s",
          "chapter_id" => 16
        ],
        [
          "name" => "Execution Context, Hoisting & Scope",
          "video" => "8mZsm9ZQFdY",
          "chapter_id" => 17
        ],
        [
          "name" => "Closure",
          "video" => "jsW0taT36qU",
          "chapter_id" => 17
        ],
        [
          "name" => "Arrow Function",
          "video" => "C8U_3_SBk6s",
          "chapter_id" => 18
        ],
        [
          "name" => "this pada Arrow Function",
          "video" => "xVmUTO7O7GQ",
          "chapter_id" => 18
        ],
        [
          "name" => "Higher Order Function",
          "video" => "sM880A3lS5I",
          "chapter_id" => 18
        ],
        [
          "name" => "Filter, Map & Reduce",
          "video" => "a37wgCcBI4A",
          "chapter_id" => 18
        ],
        [
          "name" => "Latihan Filter, Map & Reduce",
          "video" => "V5-rQ1MCNSM",
          "chapter_id" => 18
        ],
        [
          "name" => "Template Literals",
          "video" => "LywZF-xcfd8",
          "chapter_id" => 19
        ],
        [
          "name" => "Template Literals (Latihan)",
          "video" => "i4RIoT2tmpw",
          "chapter_id" => 19
        ],
        [
          "name" => "Tagged Template Literals",
          "video" => "sbjkjjCcz8M",
          "chapter_id" => 19
        ],
      ]
    );
  }
}
