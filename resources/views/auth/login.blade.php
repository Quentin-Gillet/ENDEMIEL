{{--@extends('layouts.master')--}}


<form action="{{ route('login') }}" method="POST">
    @csrf
    <input name="email" placeholder="email">
    <input name="password" placeholder="password">
    <button type="submit">Submit</button>
</form>
