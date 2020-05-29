<form action="/rest" method="post">
  <table>
    @csrf
    <tr>
      <th>message: </th>
      <td><input type="text" name="message" value="{{ old('message') }}"></td>
      <th>url: </th>
      <td><input type="text" name="url" value="{{ old('url') }}"></td>
      <th></th><td><input type="submit" value="send"></td>
    </tr>
  </table>
</form>