<!-- This is the Footer from Backend -->

<script>
  var allRowLinks = document.querySelectorAll('tr.row-link');
  for (var i = allRowLinks.length - 1; i >= 0; i--) {
    allRowLinks[i].addEventListener('click', function(e){
      var el;
      if ( e.target.localName == 'td' ) {
        el = e.target.parentElement;
      } else {
        el = e.target;
      }

      if ( el.classList.contains('first-click') ) {
        var $attr = el.dataset.href;
        window.location.href = $attr;
      } else {
        el.classList.add('first-click');
      }
    });
  }
</script>

<footer id="footer" class="">
<p class="text-center mt-2" style="color:#fff;margin-bottom: 0px;"> BlueFields GmbH <a href=""><a href="https://www.blue-fields.de/"></a></p>
</footer>
</body>
</html>
