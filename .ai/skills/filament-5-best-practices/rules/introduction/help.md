> ## Documentation Index
> Fetch the complete documentation index at: https://filamentphp.com/docs/llms.txt
> Use this file to discover all available pages before exploring further.

# Help

export const EditOnGitHub = ({version, path}) => {
  const url = `https://github.com/filamentphp/filament/edit/${version}/${path}`;
  return <div className="not-prose mt-16">
      <a href={url} target="_blank" rel="noopener noreferrer" className="inline-flex items-center gap-2 text-sm text-gray-500 transition hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" className="h-4 w-4">
          <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0016 8c0-4.42-3.58-8-8-8z" />
        </svg>
        Edit this page on GitHub
      </a>
    </div>;
};

export const Footer = () => {
  const sponsorsByTier = JSON.parse(`{
  "agency_partner": [
    {
      "name": "Kirschbaum",
      "url": "https://kirschbaumdevelopment.com/solutions/filament-development",
      "filename": "kirschbaum.svg"
    }
  ],
  "gold": [
    {
      "name": "Agiledrop",
      "url": "https://www.agiledrop.com/laravel?utm_source=filament",
      "filename": "agiledrop.svg"
    },
    {
      "name": "Baiz.ai",
      "url": "https://baiz.ai",
      "filename": "baiz-ai.svg"
    },
    {
      "name": "CMS Max",
      "url": "https://cmsmax.com?ref=filamentphp.com",
      "filename": "cms-max.svg"
    },
    {
      "name": "Mailtrap",
      "url": "https://mailtrap.io/email-sending?utm_source=community&utm_medium=referral&utm_campaign=filament",
      "filename": "mailtrap.svg"
    },
    {
      "name": "SerpApi",
      "url": "https://serpapi.com/?utm_source=filamentphp",
      "filename": "serpapi.svg"
    }
  ]
}`);
  function shuffleArray(items) {
    const result = [...items];
    for (let index = result.length - 1; index > 0; index--) {
      const randomIndex = Math.floor(Math.random() * (index + 1));
      [result[index], result[randomIndex]] = [result[randomIndex], result[index]];
    }
    return result;
  }
  const sponsors = Object.entries(sponsorsByTier).flatMap(([, sponsors]) => shuffleArray(sponsors));
  return <div className="mt-16 flex flex-col gap-4">
      <h2 className="text-center text-2xl font-medium text-gray-800 dark:text-gray-200">
        Sponsored by
      </h2>

      <div className="not-prose flex flex-wrap items-center justify-center gap-5">
        {sponsors.map(sponsor => <a key={sponsor.name} className="footer-sponsor-card" href={sponsor.url} target="_blank" title={sponsor.name}>
            <img src={`/docs/images/sponsors/footer/${sponsor.filename}`} alt={sponsor.name} noZoom />
            <span className="line-pattern-overlay line-pattern-80" />
          </a>)}

        <a href="https://github.com/sponsors/danharrin" target="_blank" className="footer-sponsor-cta">
          <span className="sponsor-cta-content">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round">
              <path d="M5 12h14" />
              <path d="M12 5v14" />
            </svg>
            <span>Your logo here</span>
          </span>
          <span className="line-pattern-overlay line-pattern-60" />
        </a>
      </div>
    </div>;
};

We offer a variety of support options, mostly free of charge. If you need help, the community is here for you!

## Discord

We are fortunate to have a growing community of Filament users that help each other out on our [Discord server](https://filamentphp.com/discord). Join now, it's free!
We also have many dedicated channels in different languages. Currently, we have channels for the following languages:

* [#ar](https://discord.com/channels/883083792112300104/961199444789973024) - Arabic 🇸🇦
* [#de](https://discord.com/channels/883083792112300104/998221767850070057) - German 🇩🇪
* [#es](https://discord.com/channels/883083792112300104/1049794522181275749) - Spanish 🇪🇸
* [#fa](https://discord.com/channels/883083792112300104/1042736860826443807) - Farsi 🇮🇷
* [#fr](https://discord.com/channels/883083792112300104/978572814317682688) - French 🇫🇷
* [#id](https://discord.com/channels/883083792112300104/1051444835254538271) - Indonesian 🇮🇩
* [#it](https://discord.com/channels/883083792112300104/979015654675996672) - Italian 🇮🇹
* [#ko](https://discord.com/channels/883083792112300104/1221712398017232926) - Korean 🇰🇷
* [#nl](https://discord.com/channels/883083792112300104/998685582031061102) - Dutch 🇳🇱
* [#pt-br](https://discord.com/channels/883083792112300104/966832715536162846) - Portuguese (Brazil) 🇧🇷
* [#tr](https://discord.com/channels/883083792112300104/988729996803702794) - Turkish 🇹🇷

If you are missing a channel for your language, please let us know and we will create one for you.

## GitHub

You can also reach out to us on our [GitHub discussions forum](https://github.com/filamentphp/filament/discussions), where community members and core team members are happy to help you out.

If you find a bug, you can open an [issue](https://github.com/filamentphp/filament/issues/new/choose), and even donate to the bug fix by using the link automatically added to the bottom of every new issue description.

If you have a feature request, you can create a discussion on GitHub [following these instructions](./contributing#development-of-new-features). If you are not planning to contribute the feature yourself but the core team adds it to the roadmap, an issue will be created. You can sometimes fast-track the development of a new feature by donating money to it using the link added to the bottom of the issue description.

## One-on-one private support & consulting (paid)

If you're looking for dedicated help with your Filament project, we're here for you. Whether you're a solo developer or running a large company, we provide support and development services that fit your needs. More information can be found on our [consulting page](https://filamentphp.com/consulting).

## Google

Since we make use of [Answer Overflow](https://www.answeroverflow.com/c/883083792112300104) on our [Discord](#discord) server, you are often one Google search away from finding an answer to your question or at least a hint on how to solve your problem. You may also find results from [GitHub](#github), the [Laracasts forum](#laracasts), or even Stack Overflow.

## Helping others

We encourage you to join any of the above platforms and help yourself and our community. Additionally, we encourage you to [contribute](./contributing) to Filament itself. We are always looking for new contributors to help us improve Filament.

<EditOnGitHub version="5.x" path="docs/01-introduction/05-help.md" />

<Footer />
