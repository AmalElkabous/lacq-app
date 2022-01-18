<tr>
<td class="header">
@if (trim($slot) === 'Lacq')
<img src="{{ asset("img/LACQ-logo.png")}}" style="padding:30px;" alt="Lacq Logo">
@else
{{ $slot }}
@endif
</td>
</tr>
