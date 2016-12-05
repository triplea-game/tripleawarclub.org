<div class="breadcrumb"><{$breadcrumb}></div>
<form name="<{$ratingform.name}>" id="<{$ratingform.name}>" action="<{$ratingform.action}>" method="<{$ratingform.method}>" <{$ratingform.extra}>>
    <table id="imageform" cellspacing="0">
    <!-- start of form elements loop -->
    <{foreach item=element from=$ratingform.elements}>
      <{if $element.hidden != true}>
      <tr valign="top">
        <td class="head"><{$element.caption}></td>
        <td class="<{cycle values='odd, even'}>"><{$element.body}></td>
      </tr>
      <{else}>
      <{$element.body}>
      <{/if}>
    <{/foreach}>
    <!-- end of form elements loop -->
    </table>
  </form>