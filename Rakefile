require 'map-rec'
require 'rake/clean'
require 'redcarpet'
require 'xml-dsl'



def markdown_to_html markdown
  Redcarpet::Markdown::new(Redcarpet::Render::HTML).render markdown
end


def block_is_html &block
  array = map_rec(block_is_array(&block)) do |x|
    x.is_a?(Symbol) ? x.to_s.gsub(/_*$/, '').to_sym : x
  end

  XML::from_array array
end


def file_page markdown
  markdown_to_html markdown
end


def dir_page markdown, filename
  Dir.chdir File.dirname(filename) do
    toc = Dir.entries('.').select do |path|
      path !~ /^\.+$/
    end.map do |path|
      File.directory?(path) ? File.join(path, 'index.md') : path
    end.select do |path|
      File.exist?(path) and path =~ /\.md$/
    end.map do |path|
      "- [#{File.open(path).to_a[0].sub(/^# */, '').strip}](#{path.ext '.html'})"
    end.join "\n"

    markdown_to_html(markdown + "\n" + toc)
  end
end


rule '.html' => '.md' do |t|
  str = block_is_html do
    html do
      head do
        title "raviqqe's notes"
        link rel: 'stylesheet', href: 'https://raw.githubusercontent.com/hzlzh/MarkDown-Theme/master/CSS/GitHub-ReadMe.css'
        link href: '/favicon.ico', type: 'image/x-icon', rel: 'shortcut icon'
        link href: '/favicon.ico', type: 'image/x-icon', rel: 'icon'
        link href: '/apple-touch-icon.png', type: 'image/png', \
             rel: 'apple-touch-icon'
        base_dir = '//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.7.0'
        link rel: 'stylesheet', href: "#{base_dir}/styles/default.min.css"
        script src: "#{base_dir}/highlight.min.js"
        script 'hljs.initHighlightingOnLoad();'
      end

      body do
        div do
          p_ do
            a 'back', href: '..'
          end
        end
        hr
        markdown = File.read t.source
        div(t.source =~ /\/index.md$/ ? dir_page(markdown, t.source)
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


task :default => Dir.glob('**/*.md').map { |filename| filename.ext '.html' }


CLEAN.include Dir.glob('**/*.html')
