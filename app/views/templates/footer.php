<link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/css/footerStyle.css">
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- // Jquery & js -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<style>
    [data-bs-theme = 'dark'] .wave{
        background-color: rgba(33,37,41,255);
        transition: background 0.8s, color 0.8s;
    }
</style>

<footer>
</div>
    </div>
</div>
  <section>
    <div class="wave wave1"></div>
    <!-- <div class="wave wave2"></div> -->
    <div class="wave wave3"></div>
    <div class="wave wave4"></div>
  </section>


</footer>
<script type="text/javascript">
        const currentLocation = location.pathname;
        const menuItems = document.querySelectorAll('.navigation > li > a');
        menuItems.forEach((menuItem) => {
            if (menuItem.pathname === currentLocation) {
                menuItem.classList.add('active');
            }
        });
    </script>
    
</body>
</html>