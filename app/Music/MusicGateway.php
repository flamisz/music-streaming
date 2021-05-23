<?php

namespace App\Music;

interface MusicGateway
{
    // get artist top tracks
    // return array of track ids
    public function getArtistTopTracks($artistId);

    // create playlist
    // return playlist id
    public function createPlaylist($name);

    // add items to playlist
    public function addItemsToPlaylist($playlistId, $items);

    // delete playlist
    public function deletePlaylist($playListId);

    // play playlist
    public function playPlaylist($playListId);
}
