/**
 * Creating a sidebar enables you to:
 - create an ordered group of docs
 - render a sidebar for each doc of that group
 - provide next/previous navigation

 The sidebars can be generated from the filesystem, or explicitly defined here.

 Create as many sidebars as you want.
 */

// @ts-check

/** @type {import('@docusaurus/plugin-content-docs').SidebarsConfig} */
const sidebars = {
  // By default, Docusaurus generates a sidebar from the docs folder structure
  // tutorialSidebar: [{type: 'autogenerated', dirName: '.'}],
  tutorialSidebar: [
    {
      type: 'doc',
      label: 'Release Notes',
      id: 'release-notes'
    },
    {
      type: 'category',
      label: 'Getting Started',
      items: [
        'intro',
        {
          type: 'autogenerated',
          dirName: 'getting-started'
        }
      ]
    },
    {
      type: 'category',
      label: 'Usage',
      items: [
        {
          type: 'autogenerated',
          dirName: 'usage'
        }
      ]
    }
  ],
};

module.exports = sidebars;
