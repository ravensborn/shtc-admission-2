<footer class="footer my-5 pt-3 border-top">
    <div class="container">
        <span class="text-muted">Copyright &copy; {{ Date('Y') }} - </span>
        <span>
            <a href="https://epu.edu.iq" target="_blank" class="text-muted" style="text-decoration: none;">
                Erbil Polytechnic University
            </a>
            @if(!auth()->check())
                -
                <a class="text-muted" style="text-decoration: none;" href="{{ route('login') }}">Admin Login</a>
            @endif
        </span>


    </div>
</footer>
