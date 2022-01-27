<!doctype html>
<title>{{ __('site_maintenance') }}</title>
<style>
  body { text-align: center; padding: 150px; }
  h1 { font-size: 50px; }
  body { font: 20px Helvetica, sans-serif; color: #333; }
  article { display: block; text-align: left; width: 650px; margin: 0 auto; }
  a { color: #dc8100; text-decoration: none; }
  a:hover { color: #333; text-decoration: none; }
</style>

<article>
    <h1>{{ __('we_will_be_back_soon') }}</h1>
    <div>
        <p>{{ __('sorry_for_the_inconvenience') }}<a href="mailto:#">{{ __('contact_us') }}</a>, {{ __('otherwise_we_will_be_back_online_shortly') }}</p>
        <p>{!! __('dash_team') !!}</p>
    </div>
</article>
