<div class="header_bottom">
    <div class="menu">
        <ul>
            <li class="active"><a href="{{ Route('home') }}">Home</a></li>
            <li><a href="{{route('about')}}">About</a></li>
            <li><a href="delivery.html">Delivery</a></li>
            <li><a href="news.html">News</a></li>
            <li><a href="{{route('contact')}}">Contact</a></li>

            <div class="clear"></div>
        </ul>
    </div>
    <div class="search_box">
        <form>
            <input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}"><input type="submit" value="">
        </form>
    </div>
    <div class="clear"></div>
</div>
