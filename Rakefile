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


def is_index_md path
  path =~ /(^|\/)index\.md$/
end


def is_top_index_md path
  path == 'index.md'
end


def dir_page markdown, filename
  Dir.chdir File.dirname(filename) do
    toc = Dir.entries('.').select do |path|
      path !~ /^\.+$/ and not is_index_md(path) and path !~ /\.history\.md$/
    end.map do |path|
      File.directory?(path) ? dir_to_index(path) : path
    end.select do |path|
      File.exist?(path) and path =~ /\.md$/
    end.map do |path|
      link = is_index_md(path) ? File.dirname(path) : path.ext('.html')
      "- [#{get_title(path)}](#{link})"
    end.sort_by(&:downcase).join "\n"

    markdown_to_html(markdown + "\n" + toc)
  end
end


HISTORY_DIR = '_history'

def in_history_dir path
  path =~ /(^|\/)#{HISTORY_DIR}/
end


rule '.html' => '.md' do |t|
  unless in_history_dir(t.source)
    history_command = "git log --date='format:%A, %B %d, %Y' -p #{t.source}"
    dates = `#{history_command} | grep Date:`.split("\n")
    history_dir = File.join File.dirname(t.source), HISTORY_DIR
    md_history_file = File.join history_dir, File.basename(t.source)
  end

  str = block_is_html do
    html do
      head do
        title_name = "raviqqe's notes"
        title(is_top_index_md(t.source) ? \
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

        style %(
          body {
            box-sizing: border-box;
            min-width: 200px;
            max-width: 980px;
            margin: 0 auto;
            padding: 45px;
          }

          .right-margin {
            margin-right: 1em;
          }

          @media only screen and (max-width: 480px) {
            body { padding: 1.5ex }
          }
        )
      end

      body class: 'markdown-body' do
        div do
          p_ do
            a 'top', href: '/', class: 'right-margin'
            a('back',
              href: (is_index_md(t.source) ? '..' : '.'),
              class: 'right-margin') \
              unless is_top_index_md(t.source)
          end
        end
        hr
        markdown = File.read t.source
        div((is_index_md(t.source) and not in_history_dir(t.source)) ?
            dir_page(markdown, t.source) : file_page(markdown))

        hr

        unless in_history_dir(t.source)
          div do
            p_ do
              span(dates[0].sub('Date', 'Last modified') + ', ',
                   class: 'right-margin')
              span(dates[-1].sub('Date', 'Created') + ', ',
                   class: 'right-margin')

              span do
                a 'History', href: File.join(HISTORY_DIR,
                                             File.basename(t.name))
              end
            end
          end
        end

        div markdown_to_html("
          To the extent possible under law, the person who associated
          [The Unlicense](https://unlicense.org/UNLICENSE) with this work
          has waived all copyright and related or neighboring rights to this
          work.
        ".split.join ' ')
      end
    end
  end

  unless in_history_dir(t.source)
    history = `#{history_command}`.split("\n") \
                                  .map{ |s| '    ' + s } \
                                  .join("\n")

    mkdir history_dir unless Dir.exist? history_dir
    File.write md_history_file, "# History of #{t.source}\n\n#{history}"
    Rake::Task[md_history_file.ext 'html'].invoke
  end

  File.write t.name, str
end


file 'style.css' do |t|
  sh "curl https://raw.githubusercontent.com/sindresorhus/github-markdown-css/gh-pages/github-markdown.css > #{t.name}"
end


task :default => Dir.glob('**/*.md').map{ |filename| filename.ext '.html' } \
                 .push('style.css')


CLEAN.include Dir.glob(['**/*.html', '**/_history'])
