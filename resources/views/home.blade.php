<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
    <meta charset="utf-8">
    <title></title>
    </head>
    <body>
        <form method="post" action="/search">
            <input type="text" id="key"name="key" placeholder="Masukkan Kata">
            <select name="option" id="option"class="option">
                <option value="short">Berdasarkan</option>
                <option value="short">Short</option>
                <option value="url_asli">URL</option>
            </select>
            <input  type="submit" value="Cari"/>
        </form>
        
        <select name="format" onchange="location = this.value; ">
            <option value="/paging/2">#</option>
            <option value="/paging/10">10</option>
            <option value="/paging/25">25</option>
            <option value="/paging/1000">All</option>
        </select>

        <table class="tabel" >
            <?php foreach ($posts as $post): ?>
            <tr>
                <td>
                    <p id="judul">URL :{{ $post->url_asli }}</p>
                    <p id="judul">URL Short : http://localhost/RB/rb/short/{{ $post->short }}</p>
                </td>
                <td>
                    <a href="/delete/{{ $post->short }}>
                        <button type="button" name="button">Delete</button>
                    </a>
                </td>
                <td>
                    <a href="{{ $post->utl_asli }}">
                        <button type="button" name="button">Visit</button>
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php for ($i=1; $i <= $page; $i++) { ?>
            <a href="/show/{{$i}}">
                {{$i}}
            </a>
            <?php } ?>
            <a href="/tambah">
                <button type="button" name="button">Tambah</button>
            </a>
    </body>
</html>
