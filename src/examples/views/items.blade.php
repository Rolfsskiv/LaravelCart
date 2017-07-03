<a href="/add">add</a>
<a href="/destroy">destroy</a>


<table>
    <thead>
       <tr>
           <th>ID</th>
           <th>rowId</th>
           <th>Name</th>
           <th>Скидка(1)</th>
           <th>Цена (1)</th>
           <th>Цена со скидкой (1)</th>

           <th>Всего скидка</th>
           <th>Всего цена</th>
           <th>Всего цена cо скидкой</th>
           <th>Count</th>
           <th>Func</th>
       </tr>
    </thead>
    <tbody>
        @foreach($items as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->rowId}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->discount}}</td>
                <td>{{$item->price}}</td>
                <td>{{$item->discountPrice}}</td>
                <td>{{$item->discountTotal}}</td>
                <td>{{$item->subtotal}}</td>
                <td>{{$item->total}}</td>
                <td>{{$item->qty}}</td>
                <td>
                    <form action="/count" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="qty" value="{{$item->qty + 1}}">
                        <input type="hidden" name="rowId" value="{{$item->rowId}}">
                        <button>plus</button>
                    </form>
                    <form action="/count" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="qty" value="{{$item->qty - 1}}">
                        <input type="hidden" name="rowId" value="{{$item->rowId}}">
                        <button>minus</button>
                    </form>
                    <form action="/remove" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="rowId" value="{{$item->rowId}}">
                        <button>delete</button>
                    </form>
                    <form action="/test" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="rowId" value="{{$item->rowId}}">
                        <button>test</button>
                    </form>
                    <br>
                    <form action="/discount" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="rowId" value="{{$item->rowId}}">
                        <input type="text" name="discount" value="5">
                        <button>set discount</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<table style="margin-left: 18.5%; float: left;">
    <tr>
        <td>Всего продуктов</td>
        <td>{{Cart::count()}}</td>
    </tr>
    <tr>
        <td>Скидка</td>
        <td>{{Cart::discount()}}</td>
    </tr>
    <tr>
        <td>Сумма без скидки</td>
        <td>{{Cart::subtotal()}}</td>
    </tr>
    <tr>
        <td>Сумма со скидкой</td>
        <td>{{Cart::total()}}</td>
    </tr>
</table>


<style>
    table {
        margin: auto;
    }
    table tr th {
        padding: 15px;
        text-align: left;
        border:1px black solid ;
    }
    table tr th:last-child {
        padding:0 90px;
    }
    table tr td:last-child form{
        float: left;
        padding: 0 5px;
    }
    table tr {
        border:1px black solid ;
    }

    table tr td {
        text-align: center;
        border:1px black solid ;
    }
</style>