{{--@extends('layouts.master')--}}

<form action="{{ route('register') }}" method="POST">
    @csrf
    <input name="name">
    <input name="email">
    <input name="password">
    <input name="password_confirmation">
    <button type="submit">Submit</button>
</form>
