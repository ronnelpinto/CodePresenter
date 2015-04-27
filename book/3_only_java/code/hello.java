import java.util.*;
import java.awt.*;
import java.awt.event.*;
import javax.swing.*;
import javax.accessibility.*;
public class BigExample extends JFrame {
public BigExample() {
super("Big Accessibility Example");
setSize(700,500);
setDefaultCloseOperation(EXIT_ON_CLOSE);
JMenuBar jmb = new JMenuBar();
JMenu fileMenu = new JMenu("File");
JMenuItem openItem = new JMenuItem("Open");
JMenuItem saveItem = new JMenuItem("Save");
JMenuItem exitItem = new JMenuItem("Exit");
exitItem.addActionListener(new ActionListener() {
public void actionPerformed(ActionEvent ae) {
System.exit(0);
}
});
fileMenu.add(openItem);
fileMenu.add(saveItem);
fileMenu.add(new JSeparator());
fileMenu.add(exitItem);
jmb.add(fileMenu);
setJMenuBar(jmb);
JTextArea jta = new JTextArea("[Notes]\n");
JScrollPane sp1 = new JScrollPane(jta);
sp1.setMinimumSize(new Dimension(200,200));
sp1.setPreferredSize(new Dimension(200,200));
String[] titles = { "Name", "Start Date", "Job Title" };
String[][] data = {
{"Jordan", "2001", "Director"},
{"Naveen", "1999", "Programmer"},
{"Jia", "2000", "Analyst"},
{"Brooks", "1998", "Evangelist"}
};
JTable table = new JTable(data, titles);
table.getAccessibleContext().setAccessibleDescription("Employee Statistics");
JPanel rightPane = new JPanel(new BorderLayout());
rightPane.add(new JScrollPane(table), BorderLayout.CENTER);
rightPane.add(new JLabel(new ImageIcon("logo.gif")), BorderLayout.SOUTH);
JSplitPane jsp = new JSplitPane(JSplitPane.HORIZONTAL_SPLIT, sp1, rightPane);
getContentPane().add(jsp, BorderLayout.CENTER);
JPanel bPane = new JPanel();
JButton okButton = new JButton("Ok");
JButton applyButton = new JButton("Apply");
JButton clearButton = new JButton("Clear");
bPane.add(okButton);
bPane.add(applyButton);
bPane.add(clearButton);
getContentPane().add(bPane, BorderLayout.SOUTH);
setVisible(true);
}
public static void main(String args[]) {
new BigExample();
new AssistiveExample();
}
}