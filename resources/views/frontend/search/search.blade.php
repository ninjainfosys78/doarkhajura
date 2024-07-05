<form id="search_this" action="{{route('frontend.search',['language'=>app()->getLocale()])}}" class="form-inline my-2 my-lg-0" method="get">

    <label for="search-box-255"></label>
    <input id="search-box-255" class="form-control mr-sm-2" name="keyword"
                                               type="text" autocomplete="off" placeholder="Search..." required/>
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
</form>
{{--9848108962 santosh--}}
