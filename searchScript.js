

var domains = [];
for (var i = 0; i < response.length; i++) {
  let domain = response[i]["domain"]
  domains.push(domain)
  // console.log(domain)
}

function findMatches(wordToMatch, domains) {
  const wordsArray = wordToMatch.split(" ");
  console.log('wordsArray('+wordsArray.length+'): ' + wordsArray);
  var retArray = [];
  wordsArray.forEach((word, i) => {
    var a = domains.filter(domain => {
      const regex = new RegExp(word, 'gi');
      console.log("regex: " + regex);
      return domain.match(regex)
    });
    a.forEach((domain, i) => {
      if(!retArray.includes(domain)){
        retArray.push(domain);
      }
    });
    console.log('a'+a.length+': ' + a);
    console.log('retArray now: '+retArray.length+': ' + retArray);
  });
  console.log('final array'+retArray.length+': ' + retArray);
  return retArray;
  // return domains.filter(domain => {
  //   const regex = new RegExp(wordToMatch, 'gi');
  //   return domain.match(regex)
  // });
}
function displayMatches() {
  if(this.value.length === 0) {
    numberOfResults.classList.add("hidden");
    matchingDomains.classList.add("hidden");
    originalDomains.classList.remove("hidden");
    return
  } else {
    numberOfResults.classList.remove("hidden");
    matchingDomains.classList.remove("hidden");
    originalDomains.classList.add("hidden");
  }

  const wordsArray = this.value.split(" ");
  const domainsArray = findMatches(this.value, domains);
  console.log(domainsArray);
  var dd = '';
  const html = domainsArray.map(domain => {
    wordsArray.forEach((word, i) => {
      const regex = new RegExp(word, 'gi');
      const d = domain.replace(regex, `<span class="foundword">${word}</span>`);
      dd.concat(d);
    });
    console.log('dd: ' + dd);
    // const regex = new RegExp(this.value, 'gi');
    // const d = domain.replace(regex, `<span class="foundword">${this.value}</span>`);
    return `
      <div class="domain-container">
        <h3>${dd}</h3>
      </div>
      <hr>
    `
  }).join('');
  const html2 = `<h4>${domainsArray.length} results found.</h4>`;
  matchingDomains.innerHTML = html;
  numberOfResults.innerHTML = html2;


}

const searchInput = document.querySelector('.search-bar');
const matchingDomains = document.querySelector('.matchingDomains');
const originalDomains = document.querySelector('.originalDomains');
const numberOfResults = document.querySelector('.numberOfResults');

searchInput.addEventListener('keyup', displayMatches);
