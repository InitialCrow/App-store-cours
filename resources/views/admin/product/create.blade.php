@extends('layouts.admin')

@section('content')
    <h1>New Product</h1>
    <form action="{{url('product')}}" method="post" enctype="multipart/form-data">
        <fieldset>
            <label for="title">Nom produit</label>
            <input type="text" name="title">
            @if($errors->has('title'))<span class="error">{{$errors->first('title')}}</span>
            @endif
        </fieldset>
        <fieldset>
            <label for="slug">Slug</label>
            <input type="text" name="slug">
            @if($errors->has('slug'))<span class="error">{{$errors->first('slug')}}</span>
            @endif
        </fieldset>
        <fieldset>
            <label for="price">prix</label>
            <input type="text" name="price">
            @if($errors->has('price'))<span class="error">{{$errors->first('price')}}</span>
            @endif
        </fieldset>
        <fieldset>
            <label for="quantity">Quantité</label>
            <input type="text" name="quantity">
            @if($errors->has('quantity'))<span class="error">{{$errors->first('quantity')}}</span>
            @endif
        </fieldset>
        <fieldset>
            <label for="abstract">Abstract</label>
            <textarea name="abstract"></textarea>
            @if($errors->has('abstract'))<span class="error">{{$errors->first('abstract')}}</span>
            @endif
        </fieldset>
        <fieldset>
            <label for="description">Description</label>
            <textarea name="description"></textarea>
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
                @foreach($tags as $id => $tag)
                    <option value="{{$id}}">{{$tag}}</option>
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
        </fieldset>
        {{csrf_field()}}
        <input type="submit" value="Create">
    </form>
@stop