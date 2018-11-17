<div id="shareSocial" class="col-md-4 social-buttons">
    <ul class="list social-buttons">
        <li class="list-inline-item">
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}" target="_blank">
                <i class="fa fa-facebook"></i>
            </a>
        </li>
        <li class="list-inline-item">
            <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl()) }}" target="_blank">
                <i class="fa fa-twitter"></i>
            </a>
        </li>
    </ul>
</div>