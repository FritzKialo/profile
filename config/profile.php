<?php

return [
    'name'     => 'Francis Kialo Mwendwa',
    'title'    => 'Web Developer & IT Professional',
    'location' => 'Nairobi, Kenya',
    'bio'      => 'I build powerful web applications that solve real business problems. Combining strong software engineering fundamentals with expertise in database systems, network security, and enterprise platforms — I deliver end-to-end digital solutions that are fast, scalable, and built to last.',

    'avatar'   => 'images/avatar.jpg',
    'email'    => 'kialofrances@gmail.com',
    'phone'    => '+254 718 215 432',
    'github'   => null,
    'linkedin' => 'https://www.linkedin.com/in/francis-kialo',   // ← update with your LinkedIn URL
    'fiverr'   => 'https://www.fiverr.com/francis_kialo',        // ← update with your Fiverr URL
    'upwork'   => 'https://www.upwork.com/freelancers/~01870f0614f855cce5', // ← update with your Upwork URL

    'services' => [
        [
            'icon'  => '🌐',
            'title' => 'Web Application Development',
            'desc'  => 'Full-stack web apps from idea to deployment — clean code, great UX, and solid architecture.',
        ],
        [
            'icon'  => '🗄️',
            'title' => 'Database Design & Management',
            'desc'  => 'Designing optimized relational databases with MySQL and PostgreSQL for performance and reliability.',
        ],
        [
            'icon'  => '✍️',
            'title' => 'Academic & Content Writing',
            'desc'  => 'High-quality academic research, essays, reports, and content writing — delivered on time with precision and originality since 2022.',
        ],
        [
            'icon'  => '🔒',
            'title' => 'Network & System Security',
            'desc'  => 'Implementing cybersecurity best practices, firewall configuration, and secure system architecture.',
        ],
        [
            'icon'  => '⚙️',
            'title' => 'Enterprise Systems (ERP/CRM)',
            'desc'  => 'Integrating and customising enterprise platforms to streamline business operations and workflows.',
        ],
        [
            'icon'  => '🧩',
            'title' => 'IT Consulting & Support',
            'desc'  => 'Providing tailored IT guidance, system setup, and technical support to help businesses operate smoothly.',
        ],
    ],

    'projects' => [
        [
            'name'       => 'SME Managers',
            'url'        => 'https://smemanagers.com',
            'tagline'    => 'Business Management Portal for SMEs',
            'desc'       => 'A full-featured web application designed to simplify business administration for small and medium-sized enterprises. Provides a centralised portal for user management, account control, and core business operations — helping SME owners run their businesses more efficiently.',
            'highlights' => [
                'Secure user authentication with session persistence',
                'Account creation and password recovery flows',
                'Centralised business administration dashboard',
                'Built for SMEs across Kenya',
            ],
            'tags'       => ['PHP', 'Laravel', 'MySQL', 'Full-Stack', 'SME'],
            'color'      => ['orb' => 'rgba(99,102,241,.15)', 'accent' => '#818cf8', 'glow' => 'rgba(99,102,241,.4)', 'orb_x' => '72%'],
            'featured'   => true,
        ],
        [
            'name'       => 'The Writora',
            'url'        => 'https://thewritora.com',
            'tagline'    => 'Independent Global Publishing Platform',
            'desc'       => 'A content platform connecting independent journalists, analysts, and creative writers with a worldwide audience. Features verified author profiles, premium subscriptions, and rich editorial categories spanning technology, science, business, culture, and more.',
            'highlights' => [
                '500+ articles published across 9 editorial categories',
                '50+ verified authors spanning 20+ countries',
                '10K+ monthly readers and growing',
                'Premium subscription model with Stripe & Chapa payments',
            ],
            'tags'       => ['PHP', 'Laravel', 'MySQL', 'Stripe', 'REST APIs', 'Full-Stack'],
            'color'      => ['orb' => 'rgba(124,58,237,.18)', 'accent' => '#a78bfa', 'glow' => 'rgba(167,139,250,.4)', 'orb_x' => '28%'],
            'featured'   => true,
        ],
    ],

    'skills' => [
        [
            'category' => 'Programming & Development',
            'icon'     => '💻',
            'items'    => ['Java', 'C++', 'OOP', 'HTML5', 'CSS3', 'JavaScript', 'Software Engineering'],
        ],
        [
            'category' => 'Database Management',
            'icon'     => '🗄️',
            'items'    => ['MySQL', 'PostgreSQL', 'SQL', 'Database Design', 'Query Optimization', 'Data Structures'],
        ],
        [
            'category' => 'Networks & Security',
            'icon'     => '🔒',
            'items'    => ['TCP/IP', 'LAN/WAN', 'Cryptography', 'Firewall Configuration', 'Cybersecurity', 'Network Admin'],
        ],
        [
            'category' => 'Enterprise & Web',
            'icon'     => '🌐',
            'items'    => ['ERP Systems', 'CRM Software', 'MIS', 'E-Commerce', 'POS Systems', 'Responsive Web Design'],
        ],
        [
            'category' => 'Systems & Platforms',
            'icon'     => '⚙️',
            'items'    => ['Windows', 'Linux/Unix', 'Distributed Systems', 'Virtual Machines', 'CLI'],
        ],
        [
            'category' => 'Analysis & Project Management',
            'icon'     => '📊',
            'items'    => ['System Analysis & Design', 'Agile', 'UML', 'IT Project Management', 'Business Intelligence'],
        ],
    ],

    'experience' => [
        [
            'role'       => 'Freelance Web Developer & Academic Writer',
            'company'    => 'Independent — Fiverr · Upwork · LinkedIn',
            'period'     => '2022 – Present',
            'highlights' => [
                'Built and delivered custom web applications for clients across multiple industries, from initial brief to live deployment.',
                'Developed smemanagers.com — a full-stack business management portal serving SMEs across Kenya.',
                'Produced high-quality academic papers, research reports, and technical content for clients globally.',
                'Maintained a strong track record of on-time delivery, client satisfaction, and repeat business across platforms.',
                'Managed end-to-end client relationships: requirements gathering, project scoping, delivery, and after-support.',
            ],
        ],
        [
            'role'       => 'Sales Assistant',
            'company'    => 'Bata Shoe Kenya LTD',
            'period'     => 'April 2019 – August 2019',
            'highlights' => [
                'Delivered exceptional customer service achieving consistent sales targets and contributing to store revenue growth.',
                'Managed inventory and stock control, ensuring accurate record-keeping and product availability.',
                'Processed customer transactions efficiently using point-of-sale systems.',
                'Resolved customer inquiries and complaints professionally, ensuring high satisfaction rates.',
            ],
        ],
    ],

    'languages' => [
        ['name' => 'English', 'level' => 'Fluent'],
        ['name' => 'Swahili', 'level' => 'Native'],
    ],

    'competencies' => [
        'Full-Stack Web Development',
        'Academic & Research Writing',
        'Database Architecture & Optimization',
        'Freelance Client Management',
        'System Integration & Implementation',
        'Network Security & Administration',
        'Business Process Analysis',
        'IT Infrastructure Management',
        'Agile Project Management',
        'Technical Documentation',
        'Problem Solving & Critical Thinking',
        'Team Leadership & Collaboration',
    ],
];
