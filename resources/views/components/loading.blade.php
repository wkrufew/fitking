{{-- <div class="loader"></div> --}}
<div class="loader" id="loader-6">
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <div class="flex justify-center items-center absolute mt-32">
        <p class="text-white text-base text-center relative">{{ $message  ? : 'Cargando...'  }}</p>
    </div>
</div>

<script>
    window.addEventListener("load", () => {
            const loader = document.querySelector(".loader");
            loader.classList.add("loader--hidden");
            loader.addEventListener("transitionend", () => {
                document.body.removeChild(loader);
            });
        });
</script>