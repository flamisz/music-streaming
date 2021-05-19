# Music streaming

## Preambule

Using any programming language is fine. Applying any paradigm (OOP, functional, etc) is fine.

## Task

Imagine we are launching a music streaming service for cafes and restaurants - for all visitors who come in and join the Wi-Fi network, music preferences are loaded and taken into account when streaming music at the venue. In other words, playlists are dynamically generated based on who is inside at the moment.

Your entry-point is a function that’s called every time somebody connects to Wi-Fi network:

```
exports.handler = (user, context, callback) => {
  // user is a JSON object that contains "likes" array of user's favorite artists
  // eg. {"likes":[{"id":123,"name":"Tame Impala"}]}
}
```

When this function is called, you are supposed to re-generate the current playlist. Use an imaginary Spotify SDK to play it.

This doesn’t have to be a functional code. We would like to see how you think and how you structure your code.

## Notes

- it could be a lambda function, with simple js
- my choice is Laravel
  - every project will grow, a good foundation is important
  - easy to use test environment (both backend and frontend)
  - well known, very good ecosystem for deployment, easy devops
- entry point: simple API endpoint
- mock Spotify SDK (check the real one)
- ratelimit endpoint
- store the actual list of favorites (db, cache...)
- when new list is coming, refresh the list (delete old ones - 1hour?)
- send the list to spotify sdk
- tests: mock vs 3rd party service tests
- extra features (future options):
  - restaurant id - spotify api keys
  - default list
  - filter artists by restaurants (themes for restaurants)
