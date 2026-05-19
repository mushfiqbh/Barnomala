@php
    $navLinks = [
        [
            'label' => 'হোম',
            'href' => url('/'),
            'pattern' => '/',
        ],
        [
            'label' => 'বৈশিষ্ট্যসমূহ',
            'href' => url('/features'),
            'pattern' => 'features*',
        ],
        [
            'label' => 'গ্যালারী',
            'href' => url('/gallery'),
            'pattern' => 'gallery*',
        ],
        [
            'label' => 'গ্রাহকগণ',
            'href' => url('/clients'),
            'pattern' => 'clients*',
        ],
        [
            'label' => 'সংবাদ',
            'href' => url('/news'),
            'pattern' => 'news*',
        ],
        [
            'label' => 'যোগাযোগ',
            'href' => url('/contact'),
            'pattern' => 'contact*',
        ],
    ];

    $isActive = fn($pattern) => request()->is($pattern);
@endphp

<header class="fixed inset-x-0 top-0 z-40 bg-white/90 backdrop-blur border-b border-slate-200/80 shadow-sm">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between py-3 lg:py-4">
            <a href="{{ url('/') }}" class="flex items-center">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-8 md:h-12">
            </a>

            <button id="mobile-menu-toggle" type="button"
                class="relative flex h-11 w-11 items-center justify-center rounded-xl transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 md:hidden"
                aria-expanded="false" aria-controls="mobile-menu">
                <span class="sr-only">Toggle navigation</span>
                <span class="menu-bar top"></span>
                <span class="menu-bar middle"></span>
                <span class="menu-bar bottom"></span>
            </button>

            <nav class="hidden md:flex items-center gap-6 lg:gap-8">
                <ul class="flex items-center gap-4 lg:gap-6">
                    @foreach ($navLinks as $link)
                        @php
                            $active = $isActive($link['pattern']);
                        @endphp
                        <li>
                            <a href="{{ $link['href'] }}"
                                class="group relative text-sm font-semibold tracking-wide transition-all duration-200 {{ $active ? 'text-blue-600' : 'text-slate-600 hover:text-blue-600' }}">
                                <span class="relative z-10">{{ $link['label'] }}</span>
                                <span
                                    class="absolute inset-x-0 -bottom-1 mx-auto h-1 w-0 rounded-full bg-blue-500 transition-all duration-200 group-hover:w-full {{ $active ? 'w-full' : '' }}"></span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </nav>
        </div>
    </div>

    <div id="mobile-menu"
        class="mobile-menu hidden md:hidden border-t border-slate-200 bg-white/95 backdrop-blur-sm shadow-2xl transition-all">
        <div class="container mx-auto px-4 py-6">
            <nav class="flex flex-col gap-3">
                @foreach ($navLinks as $link)
                    @php
                        $active = $isActive($link['pattern']);
                    @endphp
                    <a href="{{ $link['href'] }}" data-menu-link
                        class="flex items-center justify-between rounded-xl border border-transparent px-4 py-3 text-sm font-semibold transition-all duration-200 {{ $active ? 'bg-blue-50 text-blue-600 border-blue-100' : 'text-slate-700 hover:bg-slate-50 hover:border-slate-200' }}">
                        <span>{{ $link['label'] }}</span>
                        @if ($active)
                            <span class="inline-flex h-2 w-2 rounded-full bg-blue-500"></span>
                        @endif
                    </a>
                @endforeach
            </nav>
        </div>
    </div>

    <style>
        .menu-bar {
            position: absolute;
            left: 50%;
            width: 24px;
            height: 2px;
            background-color: rgb(51, 65, 85);
            border-radius: 9999px;
            transform-origin: center;
            transition: transform 0.2s ease-out, opacity 0.2s ease-out;
        }

        .menu-bar.top {
            transform: translate(-50%, -8px);
        }

        .menu-bar.middle {
            transform: translate(-50%, 0);
            opacity: 1;
        }

        .menu-bar.bottom {
            transform: translate(-50%, 8px);
        }

        .menu-open .menu-bar.top {
            transform: translate(-50%, 0) rotate(45deg);
        }

        .menu-open .menu-bar.middle {
            opacity: 0;
        }

        .menu-open .menu-bar.bottom {
            transform: translate(-50%, 0) rotate(-45deg);
        }

        .mobile-menu {
            transform-origin: top center;
        }

        .mobile-menu.open {
            animation: mobileMenuIn 0.28s ease forwards;
        }

        .mobile-menu.closing {
            animation: mobileMenuOut 0.22s ease forwards;
        }

        @keyframes mobileMenuIn {
            0% {
                opacity: 0;
                transform: scaleY(0.95) translateY(-8px);
            }

            100% {
                opacity: 1;
                transform: scaleY(1) translateY(0);
            }
        }

        @keyframes mobileMenuOut {
            0% {
                opacity: 1;
                transform: scaleY(1) translateY(0);
            }

            100% {
                opacity: 0;
                transform: scaleY(0.95) translateY(-8px);
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const menuButton = document.getElementById('mobile-menu-toggle');
            const menu = document.getElementById('mobile-menu');

            if (!menuButton || !menu) {
                return;
            }

            const toggleMenu = () => {
                const isOpen = menuButton.classList.toggle('menu-open');
                menuButton.setAttribute('aria-expanded', isOpen ? 'true' : 'false');

                if (menu.classList.contains('hidden')) {
                    menu.classList.remove('hidden', 'closing');
                    menu.classList.add('open');
                } else {
                    menu.classList.remove('open');
                    menu.classList.add('closing');
                    menu.addEventListener(
                        'animationend',
                        () => {
                            menu.classList.add('hidden');
                            menu.classList.remove('closing');
                        }, {
                            once: true
                        }
                    );
                }
            };

            menuButton.addEventListener('click', toggleMenu);

            menu.querySelectorAll('[data-menu-link]').forEach(link => {
                link.addEventListener('click', () => {
                    if (!menu.classList.contains('hidden')) {
                        toggleMenu();
                    }
                });
            });

            window.addEventListener('resize', () => {
                if (window.innerWidth >= 768) {
                    menu.classList.add('hidden');
                    menu.classList.remove('open', 'closing');
                    menuButton.classList.remove('menu-open');
                    menuButton.setAttribute('aria-expanded', 'false');
                }
            });

            document.addEventListener('click', (event) => {
                if (!menu.contains(event.target) && !menuButton.contains(event.target) && !menu.classList
                    .contains('hidden')) {
                    toggleMenu();
                }
            });
        });
    </script>
</header>
