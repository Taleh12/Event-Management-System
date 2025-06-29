<h2>Salam, {{ $subscriber->name ?? 'Dəyərli istifadəçi' }}!</h2>
<p>Bizdən sənə yeni kampaniya: 50% endirim!</p>
<p>Ətraflı məlumat üçün <a href="{{ $event->url }}">bu linkə</a> daxil ol.</p>

<p>Təşəkkür edirik!</p>
<p>Ən xoş arzularla,<br>
    {{ config('app.name') }}</p>
<p><small>Bu e-poçt avtomatik olaraq göndərilib. Zəhmət, bu e-poçta cavab verməyin.</small></p>
<p><small>Əgər bu e-poçtu almaq istəmirsənsə, <a
            href="{{ route('unsubscribe', ['email' => $subscriber->email]) }}">buradan</a> abunəliyini ləğv edə
        bilərsən.</small></p>
<p><small>Əlaqə üçün: <a href="mailto:{{ config('mail.from.address') }}">{{ config('mail.from.address') }}</a></small>
</p>
<p><small>Ən son yeniliklər üçün bizi <a href="{{ config('app.url') }}">veb saytımızda</a> izləyin.</small></p>
<p><small>Bu e-poçt, <a href="{{ route('privacy-policy') }}">Gizlilik Siyasətimiz</a> və <a
            href="{{ route('terms-of-service') }}">Xidmət Şərtlərimiz</a> ilə uyğun olaraq göndərilib.</small></p>
