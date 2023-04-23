<x-guest-layout>
    <div class="pt-4 bg-gray-100">
        <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
            <div class="">
                <x-authentication-card-logo />
                <div class="text-2xl font-medium">Slack Multi-channel Send</div>
            </div>

            <div class="w-full sm:max-w-2xl mt-6 p-6 bg-white shadow-md overflow-hidden sm:rounded-lg prose">
                This tool enables organizations to send message templates to multiple Slack channels at once. With this tool, you can create custom message templates and distribute them to various channels simultaneously, saving you valuable time and effort.

                <div class="mt-10">
                    <h2 class="text-2xl font-bold">Our Team</h2>
                    <p class="mt-2">We are a team of passionate developers who are committed to creating high-quality software solutions. We are always looking for new opportunities to collaborate with other developers and businesses.</p>
                </div>

                <div class="mt-10">
                    <h2 class="text-2xl font-bold">License</h2>
                    <p class="mt-2 ">Please note that the new software we have developed is licensed under the MIT License. The MIT License is a permissive open-source license that allows for free use, modification, and distribution of the software with very few restrictions. However, we encourage our users to review and comply with the license terms of the new software before using or incorporating it into their projects.</p>
                    <div class="mt-10 h-96 w-full overflow-x-auto border-2 border-gray-100">
                        <span class="font-bold">The MIT License (MIT)</span><br><br>
                        Copyright (c) 2023 Michael Noel<br><br>
                        Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:<br><br>
                        The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.<br><br>
                        THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
                    </div>
                </div>

                <div class="mt-10">
                    <h2 class="text-2xl font-bold">Laravel</h2>
                    <span class="text-sm font-semibold">Website:</span> https://laravel.com/<br>
                    <span class="text-sm font-semibold">MIT License:</span> https://github.com/laravel/framework/blob/10.x/LICENSE.md
                    <p class="mt-2">Laravel is a robust and flexible open-source PHP web application framework licensed under the MIT License. You can find more information about the Laravel license on their official website.</p>
                </div>

                <div class="mt-10">
                    <h2 class="text-2xl font-bold">Tailwind CSS</h2>
                    <span class="text-sm font-semibold">Website:</span> https://tailwindcss.com/<br>
                    <span class="text-sm font-semibold">MIT License:</span> https://github.com/tailwindlabs/tailwindcss/blob/master/LICENSE
                    <p class="mt-2">Tailwind CSS is a utility-first CSS framework that provides pre-defined CSS classes that can be used to build custom styles quickly and efficiently. It is licensed under the MIT License. You can find more information about the Tailwind CSS license on their official website.</p>
                </div>

                <div class="mt-10">
                    <h2 class="text-2xl font-bold">Alpine.js</h2>
                    <span class="text-sm font-semibold">Website:</span> https://alpinejs.dev/<br>
                    <span class="text-sm font-semibold">MIT License:</span> https://github.com/alpinejs/alpine/blob/master/LICENSE.md
                    <p class="mt-2">Alpine.js is a lightweight JavaScript framework that allows us to create dynamic user interfaces and add interactivity to our web pages without the need for a heavier framework like Vue or React. It is licensed under the MIT License.</p>
                </div>

                <div class="mt-10">
                    <h2 class="text-2xl font-bold">Laravel Jetstream</h2>
                    <span class="text-sm font-semibold">Website:</span> https://jetstream.laravel.com/1.x/introduction.html<br>
                    <span class="text-sm font-semibold">MIT License:</span> https://github.com/laravel/jetstream/blob/1.x/LICENSE.md
                    <p class="mt-2">Jetstream is an efficient and flexible application scaffolding that includes essential features like authentication, two-factor authentication, email verification, and team management. It is licensed under the MIT License.</p>
                </div>

                <div class="mt-10">
                    <h2 class="text-2xl font-bold">Vite</h2>
                    <span class="text-sm font-semibold">Website:</span> https://vitejs.dev/<br>
                    <span class="text-sm font-semibold">MIT License:</span> https://github.com/laravel/vite-plugin/blob/main/LICENSE.md
                    <p class="mt-2">Vite.js is a fast and efficient build tool for modern web applications, with a focus on developer experience and support for multiple frameworks.</p>
                </div>

                <div class="mt-10">
                    <h2 class="text-2xl font-bold">JoliCode</h2>
                    <span class="text-sm font-semibold">Website:</span> https://jolicode.com/<br>
                    <span class="text-sm font-semibold">MIT License:</span> https://github.com/jolicode/slack-php-api/blob/main/LICENSE.md
                    <p class="mt-2">JoliCode is a renowned software development agency that specializes in web and mobile applications. JoliCode's Slack PHP API is an open-source PHP library that provides a simple and efficient way to interact with the Slack API.</p>
                </div>

                <div class="mt-10">
                    <h2 class="text-2xl font-bold">Slack</h2>
                    <span class="text-sm font-semibold">Website:</span> https://slack.com/<br>
                    <span class="text-sm font-semibold">Terms of Service:</span> https://slack.com/intl/en-ae/terms-of-service
                    <p class="mt-2">Slack is a cloud-based collaboration platform that provides instant messaging, file sharing, and video conferencing capabilities. Their software is licensed under their Terms of Service, which outlines the legal conditions of use for the platform.</p>
                </div>
            </div>
            <a href="{{ route('sendmessages') }}" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded mt-10 mb-10">Back to Dashboard</a>
        </div>
    </div>
</x-guest-layout>
