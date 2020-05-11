var domains = [];
for (var i = 0; i < response.length; i++) {
  let domain = response[i]["domain"]
  domains += domain
  // console.log(domain)
}

function findMatches(wordToMatch, d) {
  return d.filter(domain => {
    const regex = new RegExp(wordToMatch, 'gi');
    return d.match(regex);
  });
}
