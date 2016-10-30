require 'map-rec'
require 'rake/clean'
require 'redcarpet'
require 'xml-dsl'



def markdown_to_html markdown
  Redcarpet::Markdown::new(Redcarpet::Render::HTML, fenced_code_blocks: true).render markdown
end


def block_is_html &block
  array = map_rec(block_is_array(&block)) do |x|
    x.is_a?(Symbol) ? x.to_s.gsub(/_*$/, '').to_sym : x
  end

  XML::from_array array, format: false
end


def file_page markdown
  markdown_to_html markdown
end


def get_title path
  path = dir_to_index(path) if File.directory?(path)
  File.open(path).to_a[0].sub(/^# */, '').strip
end


def dir_to_index path
  File.join path, 'index.md'
end


def dir_page markdown, filename
  Dir.chdir File.dirname(filename) do
    toc = Dir.entries('.').select do |path|
      path !~ /^\.+$/ and path !~ /index\.md$/
    end.map do |path|
      File.directory?(path) ? dir_to_index(path) : path
    end.select do |path|
      File.exist?(path) and path =~ /\.md$/
    end.map do |path|
      "- [#{get_title(path)}](#{path.ext '.html'})"
    end.sort_by(&:downcase).join "\n"

    markdown_to_html(markdown + "\n" + toc)
  end
end


rule '.html' => '.md' do |t|
  str = block_is_html do
    html do
      head do
        title_name = "raviqqe's notes"
        title(t.source =~ /^(|\/|\.\/)index\.md$/ ? \
              title_name : get_title(t.source) + " | " + title_name)
        link rel: 'stylesheet', type: 'text/css', href: '/style.css'
        link href: '/favicon.ico', type: 'image/x-icon', rel: 'shortcut icon'
        link href: '/favicon.ico', type: 'image/x-icon', rel: 'icon'
        link href: '/apple-touch-icon.png', type: 'image/png', \
             rel: 'apple-touch-icon'
        meta name: 'viewport', content: 'width=device-width'
        base_dir = '//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.7.0'
        link rel: 'stylesheet', href: "#{base_dir}/styles/default.min.css"
        script src: "#{base_dir}/highlight.min.js"
        script 'hljs.initHighlightingOnLoad();'

        style %(body {
          box-sizing: border-box;
          min-width: 200px;
          max-width: 980px;
          margin: 0 auto;
          padding: 45px;
        })
      end

      body class: 'markdown-body' do
        div do
          p_ do
            a 'back', href: (t.source =~ /(^|\/)index\.md$/ ? '..' : '.')
          end
        end
        hr
        markdown = File.read t.source
        div(t.source =~ /(^|\/)index.md$/ ? dir_page(markdown, t.source)
                                          : file_page(markdown))
        hr
        div markdown_to_html("
          To the extent possible under law, the person who associated
          [The Unlicense](https://unlicense.org/UNLICENSE) with this work
          has waived all copyright and related or neighboring rights to this
          work.
        ".split.join ' ')
      end
    end
  end

  File.write t.name, str
end


file 'style.css' do |t|
  sh "curl https://raw.githubusercontent.com/sindresorhus/github-markdown-css/gh-pages/github-markdown.css > #{t.name}"
end


task :default => Dir.glob('**/*.md').map{ |filename| filename.ext '.html' } \
                 .push('style.css')


CLEAN.include Dir.glob('**/*.html')
