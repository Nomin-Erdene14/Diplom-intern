<x-mail::message>
# Танилцуулга

Сайн байна уу,{{$data['friend_email']}},{{$data['your_name']}}
({{$data['your_email']}})-тэй хэрэглэгч таньд энэхүү дадлагыг 
санал болгож байна. Та доорх товч дээр дарж дадлагын зарыг харна уу.

<x-mail::button :url="$data['jobUrl']">
    
Зар үзэх
</x-mail::button>

Баярлалаа,<br>
{{ config('app.name') }}
</x-mail::message>
