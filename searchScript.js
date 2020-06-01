


function findMatches(wordToMatch, domains) {
  var wordsArray = wordToMatch.split(" ");
  wordsArray = wordsArray.filter(word => {
    // console.log('word ('+word.length+'): ' + word);
    return word.length > 1;
  })

  // console.log('wordsArray('+wordsArray.length+'): ' + wordsArray);
  var retArray = [];
  wordsArray.forEach((word, i) => {
    var a = domains.filter(domain => {
      const regex = new RegExp(word, 'gi');
      // console.log("regex: " + regex);
      return domain.match(regex)
    });
    a.forEach((domain, i) => {
      if(!retArray.includes(domain)){
        retArray.push(domain);
      }
    });
    // console.log('a'+a.length+': ' + a);
    // console.log('retArray now: '+retArray.length+': ' + retArray);
  });
  // console.log('final array'+retArray.length+': ' + retArray);
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
  var dd = '';
  const html = domainsArray.map(domain => {
    // wordsArray.forEach((word, i) => {
    //   const regex = new RegExp(word, 'gi');
    //   const d = domain.replace(regex, `<span class="foundword">${word}</span>`);
    //   console.log('d:' + d);
    //   dd += d;
    // });
    // console.log('dd: ' + dd);
    // const regex = new RegExp(this.value, 'gi');
    // const d = domain.replace(regex, `<span class="foundword">${this.value}</span>`);
    let originalDomain = domain;
    if (domain.length >= 23) {
      domain = `<span class="long-url">${domain}</span>`;
    }
    return `
      <div class="domain-container">
        <h3>${domain}</h3>
        <a href="mailto:info@roostergrin.com?subject=DOMAIN INQUIRY - ${originalDomain}" class="contact-btn">Contact Us!</a>
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
