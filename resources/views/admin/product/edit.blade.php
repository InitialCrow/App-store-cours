@extends('layouts.admin')

@section('content')
    <h1>New Product</h1>
    <form action="{{url('product',$product->id)}}" method="post" enctype="multipart/form-data">
        <fieldset>
            <label for="title">Nom produit</label>
            <input type="text" name="title" value="{{$product->title}}">
            @if($errors->has('title'))<span class="error">{{$errors->first('title')}}</span>
            @endif
        </fieldset>
        <fieldset>
            <label for="slug">Slug</label>
            <input type="text" name="slug" value="{{$product-> slug}}">
            @if($errors->has('slug'))<span class="error">{{$errors->first('slug')}}</span>
            @endif
        </fieldset>
        <fieldset>
            <label for="price">prix</label>
            <input type="text" name="price" value="{{$product-> price}}">
            @if($errors->has('price'))<span class="error">{{$errors->first('price')}}</span>
            @endif
        </fieldset>
        <fieldset>
            <label for="quantity">Quantité</label>
            <input type="text" name="quantity" value="{{$product-> quantity}}">
            @if($errors->has('quantity'))<span class="error">{{$errors->first('quantity')}}</span>
            @endif
        </fieldset>
        <fieldset>
            <label for="abstract">Abstract</label>
            <textarea name="abstract" >{{$product-> abstract}}</textarea>
            @if($errors->has('abstract'))<span class="error">{{$errors->first('abstract')}}</span>
            @endif
        </fieldset>
        <fieldset>
            <label for="description">Description</label>
            <textarea name="description" >{{$product-> content}}</textarea>
            @if($errors->has('description'))<span class="error">{{$errors->first('description')}}</span>
            @endif
        </fieldset>
        <fieldset>
            <label for="category">Catégorie</label>
            <select name="category_id" id="category">
                @foreach($categories as $id => $category)
                    <option value="{{$id}}">{{$category}}</option>
                @endforeach
            </select>
        </fieldset>
        <fieldset>
            <label for="tags">Tags</label>
            <select name="tag_id[]" id="tags" multiple>
                @foreach($tags as $id => $name)
                    <option value="{{$id}}" {{$product->hasTag($id)? 'selected':''}}>{{$name}}</option>
                @endforeach
            </select>
        </fieldset>
        <fieldset>
            <input type="checkbox" name="published_at"> date de publication ( maintenant )
        </fieldset>
        <fieldset>
            <label for="status">Status du produit</label>
            <input type="radio" name="status" value="published"> published
            <input type="radio" name="status" value="unpublished" checked> unpublished
        </fieldset>
        <fieldset>
            
            <label for="image">image</label>
            <input type="file" name="image">
            @if(!is_null($product->picture))
            <img src="{{url('uploads',$product->picture->uri)}}" alt="">
            @endif
        </fieldset>
        {{csrf_field()}}
        {{method_field('PUT')}}
        <input type="submit" value="modifier">
        
    </form>
@stop