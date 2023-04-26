@php
    $general = App\Models\General::first();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>404 - {{ $general->website_name }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('storage/' . $general->browser_logo) }}">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="{{ asset('admin-assets/vendor/bootstrap-icons/font/bootstrap-icons.css') }}">

    <link rel="stylesheet" href="{{ asset('admin-assets/vendor/tom-select/dist/css/tom-select.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/vendor/quill/dist/quill.snow.css') }}">

    <!-- CSS Front Template -->

    <link rel="preload" href="{{ asset('admin-assets/css/theme.min.css') }}" data-hs-appearance="default" as="style">
    <link rel="preload" href="{{ asset('admin-assets/css/theme-dark.min.css') }}" data-hs-appearance="dark" as="style">

    <style data-hs-appearance-onload-styles>
        * {
            transition: unset !important;
        }

        body {
            opacity: 0;
        }
    </style>

    <script>
        window.hs_config = {
            "autopath": "@@autopath",
            "deleteLine": "hs-builder:delete",
            "deleteLine:build": "hs-builder:build-delete",
            "deleteLine:dist": "hs-builder:dist-delete",
            "previewMode": false,
            "startPath": "/",
            "vars": {
                "themeFont": "https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap",
                "version": "?v=1.0"
            },
            "layoutBuilder": {
                "extend": {
                    "switcherSupport": true
                },
                "header": {
                    "layoutMode": "default",
                    "containerMode": "container-fluid"
                },
                "sidebarLayout": "default"
            },
            "themeAppearance": {
                "layoutSkin": "default",
                "sidebarSkin": "default",
                "styles": {
                    "colors": {
                        "primary": "#4AAF49",
                        "transparent": "transparent",
                        "white": "#fff",
                        "dark": "132144",
                        "gray": {
                            "100": "#f9fafc",
                            "900": "#1e2022"
                        }
                    },
                    "font": "Inter"
                }
            },
            "languageDirection": {
                "lang": "en"
            },
            "skipFilesFromBundle": {
                "dist": ["assets/js/hs.theme-appearance.js", "assets/js/hs.theme-appearance-charts.js", "assets/js/demo.js"],
                "build": ["assets/css/theme.css", "assets/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside-mini-cache.js", "assets/js/demo.js", "assets/css/theme-dark.css", "assets/css/docs.css", "assets/vendor/icon-set/style.css", "assets/js/hs.theme-appearance.js", "assets/js/hs.theme-appearance-charts.js", "node_modules/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.min.js", "assets/js/demo.js"]
            },
            "minifyCSSFiles": ["assets/css/theme.css", "assets/css/theme-dark.css"],
            "copyDependencies": {
                "dist": {
                    "*assets/js/theme-custom.js": ""
                },
                "build": {
                    "*assets/js/theme-custom.js": "",
                    "node_modules/bootstrap-icons/font/*fonts/**": "assets/css"
                }
            },
            "buildFolder": "",
            "replacePathsToCDN": {},
            "directoryNames": {
                "src": "./src",
                "dist": "./dist",
                "build": "./build"
            },
            "fileNames": {
                "dist": {
                    "js": "theme.min.js",
                    "css": "theme.min.css"
                },
                "build": {
                    "css": "theme.min.css",
                    "js": "theme.min.js",
                    "vendorCSS": "vendor.min.css",
                    "vendorJS": "vendor.min.js"
                }
            },
            "fileTypes": "jpg|png|svg|mp4|webm|ogv|json"
        }
        window.hs_config.gulpRGBA = (p1) => {
            const options = p1.split(',')
            const hex = options[0].toString()
            const transparent = options[1].toString()

            var c;
            if (/^#([A-Fa-f0-9]{3}){1,2}$/.test(hex)) {
                c = hex.substring(1).split('');
                if (c.length == 3) {
                    c = [c[0], c[0], c[1], c[1], c[2], c[2]];
                }
                c = '0x' + c.join('');
                return 'rgba(' + [(c >> 16) & 255, (c >> 8) & 255, c & 255].join(',') + ',' + transparent + ')';
            }
            throw new Error('Bad Hex');
        }
        window.hs_config.gulpDarken = (p1) => {
            const options = p1.split(',')

            let col = options[0].toString()
            let amt = -parseInt(options[1])
            var usePound = false

            if (col[0] == "#") {
                col = col.slice(1)
                usePound = true
            }
            var num = parseInt(col, 16)
            var r = (num >> 16) + amt
            if (r > 255) {
                r = 255
            } else if (r < 0) {
                r = 0
            }
            var b = ((num >> 8) & 0x00FF) + amt
            if (b > 255) {
                b = 255
            } else if (b < 0) {
                b = 0
            }
            var g = (num & 0x0000FF) + amt
            if (g > 255) {
                g = 255
            } else if (g < 0) {
                g = 0
            }
            return (usePound ? "#" : "") + (g | (b << 8) | (r << 16)).toString(16)
        }
        window.hs_config.gulpLighten = (p1) => {
            const options = p1.split(',')

            let col = options[0].toString()
            let amt = parseInt(options[1])
            var usePound = false

            if (col[0] == "#") {
                col = col.slice(1)
                usePound = true
            }
            var num = parseInt(col, 16)
            var r = (num >> 16) + amt
            if (r > 255) {
                r = 255
            } else if (r < 0) {
                r = 0
            }
            var b = ((num >> 8) & 0x00FF) + amt
            if (b > 255) {
                b = 255
            } else if (b < 0) {
                b = 0
            }
            var g = (num & 0x0000FF) + amt
            if (g > 255) {
                g = 255
            } else if (g < 0) {
                g = 0
            }
            return (usePound ? "#" : "") + (g | (b << 8) | (r << 16)).toString(16)
        }
    </script>
</head>

<body class="d-flex align-items-center min-h-100">

    <script src="{{ asset('admin-assets/js/hs.theme-appearance.js') }}"></script>

    <!-- ========== MAIN CONTENT ========== -->
    <main id="content" role="main" class="main">
        <!-- Content -->
        <div class="container">
            <a class="position-absolute top-0 start-0 end-0 py-4" href="/">
                <img class="avatar avatar-xl avatar-4x3 avatar-centered" src="{{ asset('storage/' . $general->logo) }}" alt="Image Description" data-hs-theme-appearance="default">
                <img class="avatar avatar-xl avatar-4x3 avatar-centered" src="{{ asset('storage/' . $general->logo_white) }}" alt="Image Description" data-hs-theme-appearance="dark">
            </a>

            <div class="footer-height-offset d-flex justify-content-center align-items-center flex-column">
                <div class="row justify-content-center align-items-sm-center w-100">
                    <div class="col-9 col-sm-6 col-lg-4">
                        <div class="text-center text-sm-end me-sm-4 mb-5 mb-sm-0">
                            <img class="img-fluid" src="{{ asset('admin-assets/svg/illustrations/oc-thinking.svg') }}" alt="Image Description" data-hs-theme-appearance="default">
                            <img class="img-fluid" src="{{ asset('admin-assets/svg/illustrations-light/oc-thinking.svg') }}" alt="Image Description" data-hs-theme-appearance="dark">
                        </div>
                    </div>
                    <!-- End Col -->

                    <div class="col-sm-6 col-lg-4 text-center text-sm-start">
                        <h1 class="display-1 mb-0">404</h1>
                        <p class="lead">Maaf, halaman yang Anda cari tidak ditemukan. Silakan periksa kembali URL yang Anda masukkan atau kembali ke halaman sebelumnya.</p>
                        <a class="btn btn-primary" href="./error-500.html">Reload page</a>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>
        </div>
        <!-- End Content -->

        <!-- Footer -->
        <div class="footer text-center">
            <ul class="list-inline list-separator">
                <li class="list-inline-item">
                    <a class="list-separator-link" href="#">Front Support</a>
                </li>

                <li class="list-inline-item">
                    <a class="list-separator-link" href="#">Front Status</a>
                </li>

                <li class="list-inline-item">
                    <a class="list-separator-link" href="#">Get Help</a>
                </li>
            </ul>
        </div>
        <!-- End Footer -->

        <!-- JS Global Compulsory  -->
        <script src="{{ asset('admin-assets/vendor/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('admin-assets/vendor/jquery-migrate/dist/jquery-migrate.min.js') }}"></script>
        <script src="{{ asset('admin-assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

        <!-- JS Implementing Plugins -->
        <script src="{{ asset('admin-assets/vendor/hs-toggle-password/dist/js/hs-toggle-password.js') }}"></script>
        <script src="{{ asset('admin-assets/vendor/tom-select/dist/js/tom-select.complete.min.js') }}"></script>

        <!-- JS Front -->
        <script src="{{ asset('admin-assets/js/theme.min.js') }}"></script>

        <!-- JS Plugins Init. -->
        <script>
            (function() {
                window.onload = function() {
                    // INITIALIZATION OF BOOTSTRAP VALIDATION
                    // =======================================================
                    HSBsValidation.init('.js-validate', {
                        onSubmit: data => {}
                    })


                    // INITIALIZATION OF TOGGLE PASSWORD
                    // =======================================================
                    new HSTogglePassword('.js-toggle-password')


                    // INITIALIZATION OF SELECT
                    // =======================================================
                    HSCore.components.HSTomSelect.init('.js-select')
                }
            })()
        </script>
</body>

</html>
