@extends('layouts.admin')

@section('content')
    <a href="{{url('product/create')}}">Add product</a>
    <table>
        <tr>
            <td>status</td>
            <td>Name</td>
            <td>Price</td>
            <td>Quantity</td>
            <td>Date</td>
            <td>Category</td>
            <td>Tags</td>
            <td>action</td>
        </tr>
            @forelse($products as $product)
            <tr>
                <td>
                    <a href="{{url('product/'.$product->id.'/edit')}}">{{$product->status}}</a>
                </td>
                <td>
                    <a href="">{{$product->title}}</a>
                </td>
                <td>
                    <p>{{$product->price}}€</p>
                </td>
                <td>
                    <p>{{$product->quantity}}</p>
                </td>
                <td>
                    <p>{{$product->published_at}}</p>
                </td>
                <td>
                    <p>{{($cat = $product->category) ? $cat->title :'No category'}}</p>
                </td>
                <td>
                    <ul>
                        @forelse($product->tags as $tag)
                            <li>{{$tag->name}}</li>
                            @empty
                            <p>No tags</p>
                        @endforelse
                    </ul>
                </td>
                <td>
                    <form action="{{url('product',$product->id)}}" method="post">
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                        <input  class="delete" type="submit" value="delete">
                    </form>
                </td>
            </tr>
            @empty
                <p>No product</p>
            @endforelse

    </table>
    {!! $products->links() !!}
@stop

