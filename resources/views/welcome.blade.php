<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>API Documentation</title>
    @vite('resources/css/app.css')
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
</head>
<body class="bg-gray-50 text-gray-800 font-sans leading-relaxed">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-center mb-6 text-blue-600">API Documentation</h1>
        <p class="text-lg mb-6 bg-white shadow rounded-lg p-4">
            This is the documentation for the Simple Blog API. <br>
            <h2 class="text-2xl font-bold text-blue-600">Headers</h2>
            <ul class="list-disc pl-8 space-y-2">
                <li><span class="font-medium">user-agent:</span> as browser</li>
                <li><span class="font-medium">Accept:</span> application/json</li>
                <li><span class="font-medium">Cookie:</span> Your session cookies</li>
            </ul>
        </p>
        <div class="space-y-8">
            <div>
                <h2 class="text-2xl font-bold text-blue-600">Register</h2>
                <ul class="list-disc pl-8 mt-2 space-y-2">
                    <li><span class="font-medium">Method:</span> POST</li>
                    <li><span class="font-medium">Endpoint:</span> <code>api/register</code></li>
                    <li>
                        <span class="font-medium">Parameters:</span>
                        <ul class="list-circle pl-8 mt-2">
                            <li>name</li>
                            <li>email</li>
                            <li>password</li>
                            <li>password_confirmation</li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-blue-600">Login</h2>
                <ul class="list-disc pl-8 mt-2 space-y-2">
                    <li><span class="font-medium">Method:</span> POST</li>
                    <li><span class="font-medium">Endpoint:</span> <code>api/login</code></li>
                    <li>
                        <span class="font-medium">Parameters:</span>
                        <ul class="list-circle pl-8 mt-2">
                            <li>email</li>
                            <li>password</li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-blue-600">Logout</h2>
                <ul class="list-disc pl-8 mt-2 space-y-2">
                    <li><span class="font-medium">Method:</span> POST</li>
                    <li><span class="font-medium">Endpoint:</span> <code>api/logout</code></li>
                    <li><span class="font-medium">Token:</span> Bearer</li>
                </ul>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-blue-600">Create Post</h2>
                <ul class="list-disc pl-8 mt-2 space-y-2">
                    <li><span class="font-medium">Method:</span> POST</li>
                    <li><span class="font-medium">Endpoint:</span> <code>api/add/post</code></li>
                    <li>
                        <span class="font-medium">Parameters:</span>
                        <ul class="list-circle pl-8 mt-2">
                            <li>title</li>
                            <li>content</li>
                        </ul>
                    </li>
                    <li><span class="font-medium">Token:</span> Bearer</li>
                </ul>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-blue-600">Edit Post</h2>
                <ul class="list-disc pl-8 mt-2 space-y-2">
                    <li><span class="font-medium">Method:</span> PUT</li>
                    <li><span class="font-medium">Endpoint:</span> <code>api/edit/post</code></li>
                    <li>
                        <span class="font-medium">Parameters:</span>
                        <ul class="list-circle pl-8 mt-2">
                            <li>title</li>
                            <li>content</li>
                            <li>post_id</li>
                        </ul>
                    </li>
                    <li><span class="font-medium">Token:</span> Bearer</li>
                </ul>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-blue-600">Delete Post</h2>
                <ul class="list-disc pl-8 mt-2 space-y-2">
                    <li><span class="font-medium">Method:</span> DELETE</li>
                    <li><span class="font-medium">Endpoint:</span> <code>api/delete/post</code></li>
                    <li><span class="font-medium">Token:</span> Bearer</li>
                </ul>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-blue-600">Get All Posts</h2>
                <ul class="list-disc pl-8 mt-2 space-y-2">
                    <li><span class="font-medium">Method:</span> GET</li>
                    <li><span class="font-medium">Endpoint:</span> <code>api/posts</code></li>
                </ul>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-blue-600">Single Post</h2>
                <ul class="list-disc pl-8 mt-2 space-y-2">
                    <li><span class="font-medium">Method:</span> GET</li>
                    <li><span class="font-medium">Endpoint:</span> <code>api/post/{post_id}</code></li>
                    <li><span class="font-medium">Token:</span> Bearer</li>
                </ul>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-blue-600">Add Comment</h2>
                <ul class="list-disc pl-8 mt-2 space-y-2">
                    <li><span class="font-medium">Method:</span> POST</li>
                    <li><span class="font-medium">Endpoint:</span> <code>api/comment</code></li>
                    <li>
                        <span class="font-medium">Parameters:</span>
                        <ul class="list-circle pl-8 mt-2">
                            <li>post_id</li>
                            <li>content</li>
                        </ul>
                    </li>
                    <li><span class="font-medium">Token:</span> Bearer</li>
                </ul>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-blue-600">Add Like</h2>
                <ul class="list-disc pl-8 mt-2 space-y-2">
                    <li><span class="font-medium">Method:</span> POST</li>
                    <li><span class="font-medium">Endpoint:</span> <code>api/like</code></li>
                    <li>
                        <span class="font-medium">Parameters:</span>
                        <ul class="list-circle pl-8 mt-2">
                            <li>post_id</li>
                        </ul>
                    </li>
                    <li><span class="font-medium">Token:</span> Bearer</li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
