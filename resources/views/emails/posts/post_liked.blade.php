<x-mail::message>
# Introduction

{{ $liker->name }} liked your posts.

<x-mail::button :url="route('posts.show', $post)">
View Post
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
